<?php

class CVars
{
   const START_YEAR = 2013; // год начала работы системы

   // даты для футера
   public static function dateForFooter()
   {
      $years = CVars::START_YEAR;
      if (CVars::START_YEAR != date('Y'))
      {
        $years .= '-'.date('Y');
      }
      return $years;
   }
   
   // текст футера
   public static function footerText()
   {
       return "© lirriella@gmail.com";
   }

}

?>