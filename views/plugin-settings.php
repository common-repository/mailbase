<h2><?php _e('Email settings', $this->plugin_name) ?></h2>
<div>
  <?php if($wpform->isSaved()){ ?>
  	<div class="wpf_message success"><p>Changes are saved successfully.</p></div>
  <?php } ?>

        <div class="wpf_message warning legend-required"><p>Fields marked with <span>*</span> are required.</p></div>

        <fieldset>
            <legend>Sender settings</legend>
            <ul class="field-holder">
                <li>
                    <div class="form-label"><label for="from_email"><?php echo __('From email', $this->plugin_name) ?><span>*</span></label></div>
                    <div class="form-field"><input type="text" id="from_email" name="from_email" value="<?php echo $wpform->getField('from_email'); ?>" /></div>
                    <div class="form-description wpfextra wpfsmall"><?php echo $wpform->hasErrors('from_email') ? '<span class="error">' . $wpform->getErrors('from_email', 1) . '</span>' : __('The email that is used a sender.', $this->plugin_name) ?></div>
                </li>
                <li>
                    <div class="form-label"><label for="from_name"><?php echo __('From name', $this->plugin_name) ?><span>*</span></label></div>
                    <div class="form-field"><input type="text" id="from_name" name="from_name" value="<?php echo $wpform->getField('from_name'); ?>" /></div>
                    <div class="form-description wpfextra wpfsmall"><?php echo $wpform->hasErrors('from_name') ? '<span class="error">' . $wpform->getErrors('from_name', 1) . '</span>' : __('The name of the sender.', $this->plugin_name) ?></div>
                </li>
            </ul>
		  </fieldset>

		<fieldset>
            <legend>Server settings</legend>
            <ul class="field-holder">
                <li>
                    <div class="form-label"><label for="host"><?php echo __('SMTP Host', $this->plugin_name) ?><span>*</span></label></div>
                    <div class="form-field"><input type="text" id="host" name="host" value="<?php echo $wpform->getField('host'); ?>" /></div>
                    <div class="form-description wpfextra wpfsmall"><?php echo $wpform->hasErrors('host') ? '<span class="error">' . $wpform->getErrors('host', 1) . '</span>' : __('Server host address. For example smtp.gmail.com', $this->plugin_name) ?></div>
                </li>
                <li>
                    <div class="form-label"><label for="port"><?php echo __('SMTP Port', $this->plugin_name) ?><span>*</span></label></div>
                    <div class="form-field"><input type="text" id="port" name="port" value="<?php echo $wpform->getField('port'); ?>" /></div>
                    <div class="form-description wpfextra wpfsmall"><?php echo $wpform->hasErrors('port') ? '<span class="error">' . $wpform->getErrors('port', 1) . '</span>' : __('Server port to connect to. For example 465', $this->plugin_name) ?></div>
                </li>
                <li>
                    <div class="form-label"><label for="secure"><?php echo __('SMTP Secure', $this->plugin_name) ?></label></div>
                    <div class="form-field"><?php echo HtmlHelper::checkbox("secure", "secure", "true", $wpform->getField('secure') == 'true') ?></div>
                    <div class="form-description wpfextra wpfsmall"><?php echo $wpform->hasErrors('secure') ? '<span class="error">' . $wpform->getErrors('host', 1) . '</span>' : __('Use SSL to connect to the server', $this->plugin_name) ?></div>
                </li>
                <li>
                    <div class="form-label"><label for="auth"><?php echo __('Auth', $this->plugin_name) ?></label></div>
                    <div class="form-field"><?php echo HtmlHelper::checkbox("auth", "auth", "true", $wpform->getField('auth') == 'true') ?></div>
                    <div class="form-description wpfextra wpfsmall"><?php echo $wpform->hasErrors('auth') ? '<span class="error">' . $wpform->getErrors('auth', 1) . '</span>' : __('Use a username and password to authenticate', $this->plugin_name) ?></div>
                </li>
                <li>
                    <div class="form-label"><label for="username"><?php echo __('Auth Username', $this->plugin_name) ?></label></div>
                    <div class="form-field"><input type="text" id="username" name="username" value="<?php echo $wpform->getField('username'); ?>" /></div>
                    <div class="form-description wpfextra wpfsmall"><?php echo $wpform->hasErrors('username') ? '<span class="error">' . $wpform->getErrors('username', 1) . '</span>' : __('Username to login on the mail server', $this->plugin_name) ?></div>
                </li>
                <li>
                    <div class="form-label"><label for="password"><?php echo __('Auth Password', $this->plugin_name) ?></label></div>
                    <div class="form-field"><input type="password" id="port" name="password" value="<?php echo $wpform->getField('password'); ?>" /></div>
                    <div class="form-description wpfextra wpfsmall"><?php echo $wpform->hasErrors('password') ? '<span class="error">' . $wpform->getErrors('password', 1) . '</span>' : __('Password to login on the mail server', $this->plugin_name) ?></div>
                </li>
            </ul>
        </fieldset>


</div>
