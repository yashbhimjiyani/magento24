<?php
namespace Adobe\Session6\Block\Candidates;
class Edit extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Adobe\Session6\Api\CandidateRepositoryInterface $candidateRepositoryInterface
    )
    {
        parent::__construct($context);
        $this->candidateRepositoryInterface=$candidateRepositoryInterface;
    }

    public function getFieldValues(){
        $id=$this->getRequest()->getParam('id');
        $data=$this->candidateRepositoryInterface->getById($id);
        return $data;
    }
}