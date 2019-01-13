<?php
    function get_file($file_p)
    {
        if (file_exists($file_p))
            return (unserialize(file_get_contents($file_p)));
        return (FALSE);
    }

    function get_user($name)
    {
        $users = get_file("db/users");
        foreach($users as &$user)
        {
            if ($user['name'] === $name)
                return ($user);
        }
        return (false);
    }
?>