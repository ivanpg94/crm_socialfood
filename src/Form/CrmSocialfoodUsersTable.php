<?php

namespace Drupal\crm_socialfood\Form;


use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class CrmSocialfoodUsersTable extends FormBase
{
  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return 'crm_socialfood_User_table';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $pageNo = NULL)
  {
    $database = \Drupal::database();

    $header = [
      'NAME' => $this->t('NAME'),
      'SURNAME' => $this->t('SURNAME'),
      'TYPE' => $this->t('TYPE'),
      'EXPERIENCE' => $this->t('EXPERIENCE'),
      'RATING' => $this->t('RATING'),
      'SEX' => $this->t('SEX'),
      'AGE' => $this->t('AGE'),
      'NUMBER_SF' => $this->t('NUMBER SF'),
      'AVERAGE_TICKET' => $this->t('AVERAGE TICKET'),
      'AMOUNT' => $this->t('AMOUNT'),
      'BALANCE' => $this->t('BALANCE'),
      'DISCHAGE_DATE' => $this->t('DISCHAGE DATE'),
      'COUNTRY' => $this->t('COUNTRY'),
      'PROVINCE' => $this->t('PROVINCE'),
      'CITY' => $this->t('CITY'),
      'ORIGIN' => $this->t('ORIGIN'),
      'GUEST' => $this->t('GUEST'),
    ];
    $form['selected_form'] = [
      '#type' => 'hidden',
      '#value' => 'form', // Valor por defecto.
    ];
    $form['table'] = [
      '#type' => 'table',
      '#header' => $header,
      '#rows' => $this->get_log(),
      '#empty' => $this->t('No logs found'),
    ];


    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state)
  {

  }

  public function submitForm(array &$form, FormStateInterface $form_state)
  {

  }

  function get_log()
  {
    $NAME = "";
    $SURNAME = "";
    $TYPE = "";
    $EXPERIENCE = "";
    $RATING = "";
    $SEX = "";
    $AGE = "";
    $NUMBER_SF = "";
    $AVERAGE_TICKET = "";
    $AMOUNT = "";
    $BALANCE = "";
    $DISCHAGE_DATE = "";
    $DISCHAGE_TIME = "";
    $COUNTRY = "";
    $PROVINCE = "";
    $CITY = "";
    $ORIGIN = "";
    $GUEST = "";



    $NAME = \Drupal::request()->query->get('NAME');
    $SURNAME = \Drupal::request()->query->get('SURNAME');
    $TYPE = \Drupal::request()->query->get('TYPE');
    $EXPERIENCE = \Drupal::request()->query->get('EXPERIENCE');
    $RATING = \Drupal::request()->query->get('RATING');
    $SEX = \Drupal::request()->query->get('SEX');
    $AGE = \Drupal::request()->query->get('AGE');
    $NUMBER_SF = \Drupal::request()->query->get('NUMBER_SF');
    $AVERAGE_TICKET = \Drupal::request()->query->get('AVERAGE_TICKET');
    $AMOUNT = \Drupal::request()->query->get('AMOUNT');
    $BALANCE = \Drupal::request()->query->get('BALANCE');
    $DISCHAGE_DATE = \Drupal::request()->query->get('DISCHAGE_DATE');
    $DISCHAGE_TIME = \Drupal::request()->query->get('DISCHAGE_TIME');
    $COUNTRY = \Drupal::request()->query->get('COUNTRY');
    $PROVINCE = \Drupal::request()->query->get('PROVINCE');
    $CITY = \Drupal::request()->query->get('CITY');
    $ORIGIN = \Drupal::request()->query->get('ORIGIN');
    $GUEST = \Drupal::request()->query->get('GUEST');

    $res = array();


    $results = \Drupal::database()->select('crm_socialfood_user', 'st');

    $results->fields('st');
    $res = $results->execute()->fetchAll();
    $ret = [];
    foreach ($res as $row) {

      $ret[] = [
        'NAME' => $row->NAME,
        'SURNAME' => $row->SURNAME,
        'TYPE' => $row->TYPE,
        'EXPERIENCE' => $row->EXPERIENCE,
        'RATING' => $row->RATING,
        'SEX' => $row->SEX,
        'AGE' => $row->AGE,
        'NUMBER_SF' => $row->NUMBER_SF,
        'AVERAGE_TICKET' => $row->AVERAGE_TICKET,
        'AMOUNT' => $row->AMOUNT,
        'BALANCE' => $row->BALANCE,
        'DISCHAGE_DATE' => $row->DISCHAGE_DATE,
        'DISCHAGE_TIME' => $row->DISCHAGE_TIME,
        'COUNTRY' => $row->COUNTRY,
        'PROVINCE' => $row->PROVINCE,
        'CITY' => $row->CITY,
        'GUEST' => $row->GUEST,
      ];
    }
    return $ret;
  }

}

