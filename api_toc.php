<?php $page = basename($_SERVER['PHP_SELF'] ); ?>
<ul id="index">
<li><a href="get_started.php">Getting Started</a></li>
    <li class="on"><a href="api.php">API Documentation</a>
        <ul>
            <li <?=($page == 'authentication.php') ? 'class="on"' : '' ;?>><a href="authentication.php">Authentication</a></li>
            <li <?=($page == 'formats.php') ? 'class="on"' : '' ;?>><a href="formats.php">Request / Response Formats</a></li>
            <li <?=($page == 'rate_limiting.php') ? 'class="on"' : '' ;?>><a href="rate_limiting.php">Rate Limiting</a></li>             
            <li <?=($page == 'badges.php') ? 'class="on"' : '' ;?>><a href="badges.php">Badges</a></li>
            <li <?=($page == 'fundraising.php') ? 'class="on"' : '' ;?>><a href="fundraising.php">Fundraising</a></li>
            <li <?=($page == 'users.php') ? 'class="on"' : '' ;?>><a href="users.php">Users</a></li>
            <li <?=($page == 'ventures.php') ? 'class="on"' : '' ;?>><a href="ventures.php">Ventures</a></li>
        </ul>
    </li>
    <li><a href="best_practices.php">Best Practices</a></li>
    <li><a href="changelog.php">Revision History</a></li>
</ul>