<h3 class="page-head"><?php echo $this->lang->line('support'); ?></h3>
<br />
<div style="padding-left:20px; padding-right:20px;">
    <form method="post" action="<?php echo base_url(); ?>site/products">
        <div class="input-append" id="search">
            <input name="q" type="text" placeholder="<?php echo $this->lang->line('search'); ?>..." />
            <button class="btn" type="submit" style="font-size:12px"><?php echo $this->lang->line('search'); ?></button>
        </div>
    </form>
    <hr />
    <div class="support"><img src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>img/content/phone_support.png" width="60" /> <?php echo $this->lang->line('phone_support'); ?></div>
    <div class="support"><img src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>img/content/tea_logo.png" width="60" /> Lorem ipsum</div>
    <div class="support"><img src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>img/content/tea.png" width="60" /> Lorem ipsum</div>
    <div class="support"><img src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>img/content/ticket.png" width="60" /> <?php echo $this->lang->line('email_support'); ?></div>
</div>