<?php

                class password_reset_tokens extends tables{        
                    public function __construct(){
                        $this->table="password_reset_tokens";
                    }
                }
                $password_reset_tokens=new password_reset_tokens(); 
            