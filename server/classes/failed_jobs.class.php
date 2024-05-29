<?php

                class failed_jobs extends tables{        
                    public function __construct(){
                        $this->table="failed_jobs";
                    }
                }
                $failed_jobs=new failed_jobs(); 
            