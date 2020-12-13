<?php


class Admins extends Model {
    protected $table = "admins";

    /*
     * Get Admin by login and password
     */
    public function getAdmin($login, $password, $hash = true){
        $admin = null;

        if(!empty($login) && !empty($password))
            $admin = $this->qbf->from($this->table)->where('login', '=', htmlspecialchars($login))
                                                   ->where('password', $hash === true ? md5($password) : $password)
                                                   ->first();

        return $admin;
    }




}