<?php

namespace Source\Models;

use Source\Core\Model;

/**
 *
 * @author Alfredo Manuel <alfredomanuel127.0@gmail.com>
 * @package Source\Models
 */
class User extends Model
{
    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct("users", ["id"], ["username", "codaccess", "status", "password"]);
    }

   
 

    /**
     * @param string $email
     * @param string $columns
     * @return null|User
     */
    public function findByEmail(string $codaccess, string $columns = "*"): ?User
    {
        $find = $this->find("codaccess = :codaccess", "codaccess={$codaccess}", $columns);
        return $find->fetch();
    }


    public function photo(): ?string
    {
        if ($this->photo && file_exists(__DIR__ . "/../../" . CONF_UPLOAD_DIR . "/{$this->photo}")) {
            return $this->photo;
        }

        return null;
    }


    
    /**
     * @return bool
     */
    public function save(): bool
    {
        if (!$this->required()) {
            $this->message->warning("Nome e senha são obrigatórios");
            return false;
        }

     

        if (!is_passwd($this->password)) {
            $min = CONF_PASSWD_MIN_LEN;
            $max = CONF_PASSWD_MAX_LEN;
            $this->message->warning("A senha deve ter entre {$min} e {$max} caracteres");
            return false;
        } else {
            $this->password = passwd($this->password);
        }

        /** User Update */
        if (!empty($this->id)) {
            $userId = $this->id;

            if ($this->find("email = :e AND id != :i", "e={$this->email}&i={$userId}", "id")->fetch()) {
                $this->message->warning("O e-mail informado já está cadastrado");
                return false;
            }

            $this->update($this->safe(), "id = :id", "id={$userId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

     

        $this->data = ($this->findById($userId))->data();
        return true;
    }
}