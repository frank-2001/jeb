<?php

                class migrations extends tables{        
                    public function __construct(){
                        $this->table="migrations";
                    }
                }
                $migrations=new migrations(); 
            