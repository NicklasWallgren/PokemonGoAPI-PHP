<?php


namespace NicklasW\PkmGoApi\Authentication\Managers\PTC\Parsers\Results;

class AuthenticationInformationResult extends Result {

    /**
     * Returns the code.
     *
     * @return mixed
     */
    public function getLtCode()
    {
        return $this->data['lt'];
    }

    /**
     * Returns the execution code.
     */
    public function getExecutionCode()
    {
        return $this->data['execution'];
    }

}