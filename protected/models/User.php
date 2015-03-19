<?php

/**
 * This is the model class for table "{{users}}".
 *
 * The followings are the available columns in table '{{users}}':
 * @property integer $id
 * @property string $email
 * @property string $login
 * @property string $password
 */
class User extends CActiveRecord {

    // список домашник страниц по типу пользователя
    public static $default_pages = array(
        'admin' => array('site/login'),
        'user' => array('site/login'),
        'not' => array('site/login'),
    );
    
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{users}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('email', 'length', 'max' => 100),
            array('login', 'length', 'max' => 15),
            array('password', 'length', 'max' => 32),
            array('start_date', 'type'),
            array('common_comment', 'type'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, email, login, password, start_date, common_comment', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'email' => 'E-mail',
            'login' => 'Логин',
            'password' => 'Пароль',
            'start_date' => 'Нулевой день отсчетов',
            'common_comment' => 'Расписание',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('login', $this->login, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('start_date', $this->start_date, true);
        $criteria->compare('common_comment', $this->common_comment, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }
    
    
    // -------- getters/setters --------
    
    public function getId()
    {
      return $this->id;
    }
    public function setId($value)
    {
      $this->id = $value;
    }
    
    public function getEmail()
    {
      return $this->email;
    }
    public function setEmail($value)
    {
      $this->email = $value;
    }
    
    public function getLogin()
    {
      return $this->login;
    }
    public function setLogin($value)
    {
      $this->login = $value;
    }
    
    public function getPassword()
    {
      return $this->password;
    }
    public function setPassword($value)
    {
      $this->password = $value;
    }
    
    public function getStartDate()
    {
      return $this->start_date;
    }
    public function setStartDate($value)
    {
      $this->start_date = $value;
    }
    
    public function getCommonComment()
    {
      return $this->common_comment;
    }
    public function setCommonComment($value)
    {
      $this->common_comment = $value;
    }


    // -------- other --------

    // Проверка хешированного пароля
    public function validatePassword($password) {
        if (md5($password) === $this->Password)
            return true;
        else
            return false;
    }
    
    // Список логинов по заданному типу
    public static function getUsersByType(array $types) {
        $usersModels = User::model()->findAllBySql("SELECT login FROM user WHERE type IN ('" . (implode("','", $types)) . "') AND id='" . Yii::app()->user->id . "'");
        $usersArray = array('Lirriella');
        foreach ($usersModels as $model) {
            $usersArray[] = $model->Login;
        }

        return $usersArray;
    }

    // Выбрать домашнюю страницу
    public static function getCurrentUserDefaultPage() {
        $user = User::getCurrentUser();
        $index = 'not';
        if (isset($user->Type))
            $index = $user->Type;
        return self::$default_pages[$index];
    }
    
    // Модель авторизированного пользователя
    public static function getCurrentUser() {
        $user = User::model()->findByPk(Yii::app()->user->id);
        return $user;
    }
    
}