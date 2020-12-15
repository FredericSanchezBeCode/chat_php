<?php
namespace model;

    class Message{
        private $id;
        private $content;
        private $user_id;
        private $created_at

        public function __construct(int $id, string $content, int $user_id, date $created_at){
            $this->id = $this->setId($id);
            $this->content = $this->setContent($content);
            $this->created_at = $this->setCreated_at($created_at);
            $this->user_id = $this->setUser_id($user_id);
        }

        protected function getId():int{
            return $this->id;
        }
        protected function setId(int $id){
            $this->id = $id;
        }

        protected function getContent():string{
            return $this->content;
        }
        protected function setContent(string $content){
            $this->content = $content;
        }

        protected function getUser_id():int{
            return $this->user_id;
        }
        protected function setUser_id(User $user){
            $this->authorId = $user->getId();
        }

        protected function getCreated_at():date{
            return $this->created_at;
        }
        protected function setCreated_at(date $created_at){
            $this->created_ate = $created_at;
        }

        
?>



<!-- SELECT users.username, messages.content, message.created_at from user INNER JOIN messages on users.id ON messages.id_author -->