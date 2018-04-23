<?php

namespace Vutisch\BlogBundle\Entity;



use Symfony\Component\Validator\Constraints as Assert;

class Enquiry{

    protected $name;
    protected $email;
    protected $subject;
    protected $body;


    /**
     * @return mixed
     * @Assert\NotBlank(message="эй !!!!!!!")
     * @Assert\Length( min = 3, max =10, minMessage="min")
     *
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     *
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     * @Assert\Email()
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }


}


