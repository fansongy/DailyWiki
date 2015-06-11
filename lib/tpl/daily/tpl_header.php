<?php
/**
 * Template header, included in the main and detail files
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();
?>
<header id="autoHeader" class="header header--fixed hide-from-print" role="banner">
<!-- ********** HEADER ********** -->
<div id="dokuwiki__header"><div class="pad group">

    <?php tpl_includeFile('header.html') ?>
    <div class="headings bk">

        <div class="headings sign">
            <ul class="a11y skip">
                <li><a href="#dokuwiki__content"><?php echo $lang['skip_to_content']; ?></a></li>
            </ul>

            <h1><?php
                // get logo either out of the template images folder or data/media folder
                $logoSize = array();
                $logo = tpl_getMediaFile(array(':wiki:logo.png', ':logo.png', 'images/logo.png'), false, $logoSize);

                // display logo and wiki title in a link to the home page
                tpl_link(
                    wl(),
                    '<img src="'.$logo.'" height="32" width="32" alt="" /> <span>'.$conf['title'].'</span>',
                    'accesskey="h" title="[H]"'
                );
            ?></h1>
            <?php if ($conf['tagline']): ?>
                <p class="claim"><?php echo $conf['tagline']; ?></p>
            <?php endif ?>
        </div>

        <div class="pure-menu pure-menu-horizontal" style="float:right;width:auto;">
            <?php if ($conf['useacl']): ?>
                <li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
                    <a href="#" id="menuLink1" class="pure-menu-link">Manage</a>
                    <ul class="pure-menu-children">
                        <?php
                            if (!empty($_SERVER['REMOTE_USER'])) {
                                echo '<li class="pure-menu-item">';
                                tpl_userinfo(); /* 'Logged in as ...' */
                                echo '</li>';
                            }
                            tpl_action('admin', 1, 'li class="pure-menu-item" ');
                            tpl_action('profile', 1, 'li class="pure-menu-item"');
                            tpl_action('register', 1, 'li class="pure-menu-item"');
                            tpl_action('login', 1, 'li class="pure-menu-item"');
                        ?>
                      <!--   <li class="pure-menu-item"><a href="#" class="pure-menu-link">Email</a></li>
                        <li class="pure-menu-item"><a href="#" class="pure-menu-link">Twitter</a></li>
                        <li class="pure-menu-item"><a href="#" class="pure-menu-link">Tumblr Blog</a></li> -->
                    </ul>
                </li>
            <?php endif ?>
        </div>

        <!-- SITE TOOLS -->
        <div id="dokuwiki__sitetools">
            <h3 class="a11y"><?php echo $lang['site_tools']; ?></h3>
            <?php tpl_searchform(); ?>
            <div class="mobileTools">
                <?php tpl_actiondropdown($lang['tools']); ?>
            </div>
        </div>
        <div id="dokuwiki__links">
            <ul>
                <?php
                    tpl_action('recent', 1, 'li');
                    tpl_action('media', 1, 'li');
                    tpl_action('index', 1, 'li');
                ?>
            </ul>
        </div> 

    </div>
    <!-- BREADCRUMBS -->
    <?php if($conf['breadcrumbs'] || $conf['youarehere']): ?>
        <div class="breadcrumbs">
            <?php if($conf['youarehere']): ?>
                <div class="youarehere"><?php tpl_youarehere() ?></div>
            <?php endif ?>
            <?php if($conf['breadcrumbs']): ?>
                <div class="trace"><?php tpl_breadcrumbs() ?></div>
            <?php endif ?>
        </div>
    <?php endif ?>

    <?php html_msgarea() ?>

    <hr class="a11y" />
</div></div>
</header>
<!-- /header -->
