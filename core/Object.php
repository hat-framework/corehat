<?php

namespace corehat\core;

class Object{

    /**
     * @abstract mensagens de execussao
     */
    private $object_msg = array();

    /**
     * @abstract seta uma nova mensagem de erro
     * @param string $msg   mensagem de erro
     * @return bool false (always)
     */
    public function setErrorMessage($msg){
        $this->setMessage("erro", $msg);
        return false;
    }
    
    /**
     * Adiciona um erro a string de erros e concatena com os erros que já existirem
     * @param type $msg
     * @param string glue separador entre as mensagens
     * @return boolean  always false
     */
    public function appendErrorMessage($msg, $glue = "<br/>"){
        $this->appendMessage("erro", $msg, $glue);
        return false;
    }

    /**
     * @abstract seta uma nova mensagem de sucesso
     * @param string $msg   mensagem de sucesso
     * @return bool true (always)
     */
    public function setSuccessMessage($msg){
        $this->setMessage("success", $msg);
        return true;
    }
    
    /**
     * Adiciona um sucesso a string de sucessos e concatena com os sucessos que já existirem
     * @param type $msg
     * @param string glue separador entre as mensagens
     * @return boolean always true
     */
    public function appendSuccessMessage($msg, $glue = "<br/>"){
        $this->appendMessage("success", $msg, $glue);
        return true;
    }
    
    /**
     * @abstract seta uma nova mensagem de alerta
     * @param string $msg mensagem de alerta
     */
    public function setAlertMessage($msg){
        $this->setMessage("alert", $msg);
    }
    
    /**
     * Adiciona um alerta a string de alertas e concatena com os alertas que já existirem
     * @param string $msg mensagem a ser concatenada
     * @param string glue separador entre as mensagens
     */
    public function appendAlertMessage($msg, $glue = "<br/>"){
        $this->appendMessage("alert", $msg, $glue);
    }
    
    /**
     * Concatena uma mensagem ao tipo
     * @param string $type
     * @param string $msg
     * @param string glue separador entre as mensagens
     */
    public function appendMessage($type, $msg, $glue){
        $msg = (is_array($msg))?  implode($glue, $msg):$msg;
        if(!isset($this->object_msg[$type])){$this->object_msg[$type] = "";}
        if(is_array($this->object_msg[$type])){
            $this->object_msg[$type][] = $msg;
        }else{
            $this->object_msg[$type] .= $msg.$glue;
        }
    }
    
    /**
     * Faz um merge com as mensagens passadas por parametro
     * @param array $msgs
     */
    public function setMessages($msgs){
        if(is_array($msgs) && !empty ($msgs)) {
            $this->object_msg = array_merge($this->object_msg, $msgs);
        }
    }
    
    
    /**
     * @abstract seta uma nova mensagem mas transforma arrays em strings
     * @param string $camp  nome da variável de mensagem
     * @param string $msg   mensagem da variável
     */
    public function setMessage($camp, $msg, $separator = "<br/>"){
        $msg = (is_array($msg))?  implode($separator, $msg):$msg;
        $this->object_msg[$camp] = $msg;
    }
    
    /**
     * @abstract seta uma nova mensagem mas mantém o formato original da mesma
     * @param string $camp  nome da variável de mensagem
     * @param string $msg   mensagem da variável
     */
    public function setSimpleMessage($camp, $msg){
        $this->object_msg[$camp] = $msg;
    }
    
    
    /**
     * @abstract Remove uma mensagem, caso exista
     * @param string $camp  nome da variável de mensagem
     */
    public function unsetMessage($camp){
        if(isset($this->object_msg[$camp])) unset($this->object_msg[$camp]);
    }
    
    /**
     * @abstract Adiciona uma mensagem de log
     * @param string $msg  mensagem a ser salva no log
     */
    public function addLog($msg){
        $this->object_msg['log'][] = $msg;
    }
    
    /**
     * @abstract Recupera uma mensagem de log
     * @param string $unset se true, apaga a mensagem
     * @return string
     */
    public function getLog($unset = false){
        $var = isset($this->object_msg['log'])?$this->object_msg['log']:"";
        if($unset) $this->unsetMessage ('erro');
        return $var;
    }
    
    /**
      * @abstract retorna as mensagens de erro
      * @param string $unset se true, apaga a mensagem
      * @return string
      */
     public function getErrorMessage($unset = false){
         
         $var = "";
     	 if(is_array($this->object_msg)){
             if(array_key_exists("erro", $this->object_msg)){
                $var = $this->object_msg['erro'];
             }
         }
         if($unset) $this->unsetMessage ('erro');
         $this->object_msg['erro'] = "";
         return $var;
     }

     /**
      * @abstract retorna string contendo as mensagens de sucesso caso existam
      * @param string $unset se true, apaga a mensagem
      * @return string
      */
     public function getSuccessMessage($unset = false){
     	 if(is_array($this->object_msg)){
             if(array_key_exists("success", $this->object_msg)){
                $var = $this->object_msg['success'];
             }
         }
         if($unset) $this->unsetMessage ('erro');
         $this->object_msg['success'] = "";
         return $var;
     }
     
     /**
      * @abstract retorna string contendo as mensagens de alerta, caso existam
      * @param string $unset se true, apaga a mensagem
      * @return string
      */
     public function getAlertMessage($unset = false){
         $var = "";
     	 if(is_array($this->object_msg)){
             if(array_key_exists("alert", $this->object_msg)){
                $var = $this->object_msg['alert'];
             }
         }
         if($unset) {$this->unsetMessage('alert');}
         return $var;
     }

    /**
    * @abstract array contendo todas as mensagens
    * @param string $clear se true, apaga as mensagens
    * @return array
    */
    public function getMessages($clear = false){
        $temp = $this->object_msg;
        if($clear) $this->object_msg = array();
        return $temp;
    }
    
    /**
     * @return classname Retorna o nome da classe cujo objeto herdou da classe objeto. Ex.:
     * class mamífero extends object{} 
     * class dog extends mamifero{}
     * mamífero::whoAmI() -> retornará mamifero
     * dog::whoAmI() -> retornará dog
     */
    public static function whoAmI() {
        return get_called_class();
    }

    /**
    * @abstract Create local error log and set error message
    * @param string $msg Error Message to be saved in log and setted
    * @param string $logname file name where log will be saved
    * @param array $aditionalError aditional errors to be concatenated
    * @return false
    */
    protected function LogError($msg, $logname = "", $aditionalError = array()){
        if($logname !== "") {
            Log::save($logname, $msg);
            if(!empty($aditionalError)){
                $this->setMessages($aditionalError);
                \classes\Utils\Log::save($logname, $aditionalError);
            }
        }
        return $this->setErrorMessage($msg);
    }
    
    /**
    * @abstract Set errors and alerts messages if the called method return false
    * @param \corehat\core\Object $obj 
    * @param string $method method name to be called
    * @param mixed $aditional_param One or more params if called method needs
    * @return false if method return false, true other wise
    */
    public function propagateMessage(\corehat\core\Object $obj, $method){
        $args = func_get_args();
        array_shift($args);
        array_shift($args);
        if(call_user_func_array(array($obj, $method), $args) === false){
            $this->setMessages($obj->getMessages());
            return false;
        }
        return true;
    }
    
}