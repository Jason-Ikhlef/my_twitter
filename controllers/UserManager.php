<?php 

class UserManager extends Model {

    // User table Functions Here ...

    function nicknameFromId(int $id) {

        $this->getDb();
        $data = $this->nicknameFromIdQuery($id, 'User');

        if ($data) {

            return $data;
        } else {
            return false;
        }
    }

}

?>