<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-TW">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            foundationtw::
            <?php echo $title_for_layout; ?>
        </title><?php
        echo $this->Html->meta('icon');
        echo $this->Html->css('jquery-ui');
        echo $this->Html->css('bootstrap');
        echo $this->Html->css('default');
        echo $this->Html->script('bootstrap.min');
        echo $this->Html->script('jquery');
        echo $this->Html->script('jquery-ui');
        echo $this->Html->script('olc');
        echo $scripts_for_layout;
        ?>
    </head>
    <body>
        <div class="container">
            <div id="header">
                <h1><?php echo $this->Html->link('社團/財團法人資料檢索', '/'); ?></h1>
                <div class="pull-right">
                    <input type="text" id="keyword" />
                    <div class="btn-group">
                        <a href="#" class="btn btn-default btn-foundation">找法人</a>
                        <a href="#" class="btn btn-default btn-director">找個人</a>
                    </div>
                </div>
            </div>
            <div id="content">
                <div class="btn-group">
                    <?php if ($this->Session->read('Auth.User.id')): ?>
                        <?php echo $this->Html->link('Foundations', '/admin/foundations', array('class' => 'btn')); ?>
                        <?php echo $this->Html->link('Directors', '/admin/directors', array('class' => 'btn')); ?>
                        <?php echo $this->Html->link('Members', '/admin/members', array('class' => 'btn')); ?>
                        <?php echo $this->Html->link('Groups', '/admin/groups', array('class' => 'btn')); ?>
                        <?php echo $this->Html->link('Logout', '/members/logout', array('class' => 'btn')); ?>
                    <?php else: ?>
                        <?php echo $this->Html->link('Login', '/members/login', array('class' => 'btn')); ?>
                    <?php endif; ?>
                    <?php
                    if (!empty($actions_for_layout)) {
                        foreach ($actions_for_layout as $title => $url) {
                            echo $this->Html->link($title, $url, array('class' => 'btn'));
                        }
                    }
                    ?>
                </div>

                <?php echo $this->Session->flash(); ?>
                <div id="viewContent"><?php echo $content_for_layout; ?></div>
            </div>
            <div id="footer">
                <?php
                echo $this->Html->link(
                        $this->Html->image('cake.power.gif', array(
                            'alt' => __("CakePHP: the rapid development php framework", true), 'border' => "0")
                        ), 'http://www.cakephp.org/', array('target' => '_blank', 'escape' => false)
                );
                ?>
                & <?php echo $this->Html->link('Just This Computer Studio', 'http://olc.tw/', array('target' => '_blank')); ?>
            </div>
        </div>
        <?php
        echo $this->element('sql_dump');
        ?>
        <script type="text/javascript">
            //<![CDATA[
            $(function () {
                $('a.btn-foundation').click(function() {
                    var keyword = $('input#keyword').val();
                    if(keyword !== '') {
                        location.href = '<?php echo $this->Html->url('/foundations/index/'); ?>' + encodeURIComponent(keyword);
                    }
                    return false;
                });
                $('a.btn-director').click(function() {
                    var keyword = $('input#keyword').val();
                    if(keyword !== '') {
                        location.href = '<?php echo $this->Html->url('/directors/index/'); ?>' + encodeURIComponent(keyword);
                    }
                    return false;
                });
            });
            //]]>
        </script>
    </body>
</html>