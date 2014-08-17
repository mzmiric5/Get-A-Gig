<?php
$file = fopen( '/var/www/html/gag-git-req/get-a-gig.co.uk', 'w+' );
fclose( $file );
chmod( '/var/www/html/gag-git-req/get-a-gig.co.uk', 0777);