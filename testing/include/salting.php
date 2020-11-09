<?php
$preSalt = '#HJHDF';
$postSalt = '$(Y*Dfd';

function mysql_entities_fix_string($connection, $string)
{
    return htmlentities(mysql_fix_entities($connection, $string));
}
function mysql_fix_entities($connection, $string)
{
    return $connection->real_escape_string($string);
}
