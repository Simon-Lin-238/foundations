<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-TW">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title><?php echo $title_for_layout; ?>社團/財團法人資料檢索</title><?php
        $trailDesc = '社團/財團法人資料檢索提供簡單的介面檢索國內有登記立案的社團/財團法人';
        if (!isset($desc_for_layout)) {
            $desc_for_layout = $trailDesc;
        } else {
            $desc_for_layout .= $trailDesc;
        }
        echo $this->Html->meta('description', $desc_for_layout);
        echo $this->Html->meta('icon');
        echo $this->Html->css('jquery-ui');
        echo $this->Html->css('bootstrap');
        echo $this->Html->css('default');
        echo $this->Html->script('bootstrap.min');
        echo $this->Html->script('jquery');
        echo $this->Html->script('jquery-ui');
        echo $this->Html->script('olc');
        echo $this->Html->script('zhutil.min');
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
                    <?php if (Configure::read('loginMember.id')): ?>
                        <?php echo $this->Html->link('Foundations', '/admin/foundations', array('class' => 'btn')); ?>
                        <?php echo $this->Html->link('Directors', '/admin/directors', array('class' => 'btn')); ?>
                        <?php echo $this->Html->link('Members', '/admin/members', array('class' => 'btn')); ?>
                        <?php echo $this->Html->link('Groups', '/admin/groups', array('class' => 'btn')); ?>
                        <?php echo $this->Html->link('Logout', '/members/logout', array('class' => 'btn')); ?>
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
            <div id="footer" class="container">
                <hr />
                <?php echo $this->Html->link('江明宗 . 政 . 路過', 'http://k.olc.tw/', array('target' => '_blank')); ?>
                / <?php echo $this->Html->link('關於本站', '/pages/about'); ?>
                <?php if (!Configure::read('loginMember.id')): ?>
                    / <?php echo $this->Html->link('Login', '/members/login'); ?>
                <?php endif; ?>
            </div>
        </div>
        <?php
        echo $this->element('sql_dump');
        ?>
        <script type="text/javascript">
            //<![CDATA[
            $(function () {
                $('a.btn-foundation').click(function () {
                    var keyword = $('input#keyword').val();
                    if (keyword !== '') {
                        location.href = '<?php echo $this->Html->url('/foundations/index/'); ?>' + encodeURIComponent(keyword);
                    }
                    return false;
                });
                $('a.btn-director').click(function () {
                    var keyword = $('input#keyword').val();
                    if (keyword !== '') {
                        location.href = '<?php echo $this->Html->url('/directors/index/'); ?>' + encodeURIComponent(keyword);
                    }
                    return false;
                });
            });
            //]]>
        </script>
        <?php if (Configure::read('debug') === 0) { ?>
            <script>
                (function (i, s, o, g, r, a, m) {
                    i['GoogleAnalyticsObject'] = r;
                    i[r] = i[r] || function () {
                        (i[r].q = i[r].q || []).push(arguments)
                    }, i[r].l = 1 * new Date();
                    a = s.createElement(o),
                            m = s.getElementsByTagName(o)[0];
                    a.async = 1;
                    a.src = g;
                    m.parentNode.insertBefore(a, m)
                })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

                ga('create', 'UA-40055059-5', 'auto');
                ga('send', 'pageview');

            </script>
        <?php } ?>
    </body>
</html>