<?php

class Controller_Form extends Controller_Public
{
    public function action_index()
    {
        $form = $this->forge_form();

        // 確認ページから修正ボタンを押して戻った場合
        if(Input::method() === 'POST')
        {
            // 送信されたデータをフォームに反映させる
            $form->repopulate;
        }

        $this->template->title = 'コンタクトフォーム';
        $this->template->content = View::forge('form/index');
        $this->template->content->set_safe('html_form', $form->build('form/confirm'));
    }

    // フォームの定義
    public function forge_form()
    {
        // Fieldsetオブジェクトを生成する
        $form = Fieldset::forge();

        $form->add('name', '名前')
            ->add_rule('trim')
            ->add_rule('required')
            ->add_rule('no_tab_and_newline')
            ->add_rule('max_length', 50);

        $form->add('email', 'メールアドレス')
            ->add_rule('trim')
            ->add_rule('required')
            ->add_rule('no_tab_and_newline')
            ->add_rule('max_length', 100)
            ->add_rule('valid_email');

        $form->add('comment', 'コメント',
            array('type' => 'textarea', 'cols' => 70, 'rows' => 6))
            ->add_rule('required')
            ->add_rule('max_length', 400);

        $form->add('submit', '', array('type'=>'submit', 'value' => '確認'));

        return $form;
    }

    /**
     *
     * @return void
     */
    public function action_confirm()
    {
        $val = $this->forge_validation()->add_callable('MyValidationRules');

        if ($val->run())
        {
            $data['input'] = $val->validated();
            $this->template->title = 'コンタクトフォーム: 確認';
            $this->template->content = View::forge('form/confirm', $data);
        }
        else
        {
            $this->template->title = 'コンタクトフォーム: エラー';
            $this->template->content = View::forge('form/index');
            $this->template->content->set_safe('html_error', $val->show_errors());
        }
    }

    /**
     * @return void
     * @throws HttpInvalidInputException
     */
    public function action_send()
    {
        // CSRF対策
        if ( ! Security::check_token())
        {
            throw new HttpInvalidInputException('ページ遷移が正しくありません');
        }

        $val = $this->forge_validation()->add_callable('MyValidationRules');

        if ( ! $val->run())
        {
            $this->template->title = 'コンタクトフォーム: エラー';
            $this->template->content = View::forge('form/index');
            $this->template->content->set_safe('html_error', $val->show_errors());
            return;
        }

        $post = $val->validated();
        $data = $this->build_mail($post);

        // メールの送信
        try
        {
            $this->sendmail($data);
            $this->template->title = 'コンタクトフォーム: 送信完了';
            $this->template->content = View::forge('form/send');
            return;
        }
        catch (EmailValidationFailedException $e)
        {
            Log::error(
                'メール検証エラー: ' . $e->getMessage(), __METHOD__
            );
            $html_error = '<p>メールアドレスに誤りがあります。</p>';
        }
        catch (EmailSendingFailedException $e)
        {
            Log::error(
                'メール送信エラー: ' . $e->getMessage(), __METHOD__
            );
            $html_error = '<p>メールを送信できませんでした。</p>';
        }

        $this->template->title = 'コンタクトフォーム: 送信エラー';
        $this->template->content = View::forge('form/index');
        $this->template->content->set_safe('html_error', $html_error);
    }

    /**
     * メールの作成
     *
     * @param $post
     * @return mixed
     */
    public function build_mail($post)
    {
        $data['from']      = $post['email'];
        $data['from_name'] = $post['name'];
        $data['to']        = 'info@example.jp';
        $data['to_name']   = '管理者';
        $data['subject']   = 'コンタクトフォーム';

        $ip    = Input::ip();
        $agent = Input::user_agent();

        $data['body'] = <<< END
------------------------------------------------------------
          名前: {$post['name']}
メールアドレス: {$post['email']}
    IPアドレス: $ip
      ブラウザ: $agent
------------------------------------------------------------
コメント:
{$post['comment']}
------------------------------------------------------------
END;

        return $data;
    }

    /**
     * メールの送信
     *
     * @param $data
     * @return void
     */
    public function sendmail($data)
    {
        Package::load('email');

        $email = Email::forge();
        $email->from($data['from'], $data['from_name']);
        $email->to($data['to'], $data['to_name']);
        $email->subject($data['subject']);
        $email->body($data['body']);

        $email->send();
    }
}
