<?php
$title = 'BBIT Three B';
require_once 'header.php';
?>
<body>
<h4 class="uline-wavy">
  <?= $title; ?> Quiz 1
</h4>

<?php
 require_once 'functions.php';
 $quotes = "'Joy is the serious business of heaven.'.LEWIS,CLIVE STAPLES.1964-01-01.https://bit.ly/2HwPJd6
 |'We were not meant to be somebody--we were meant to know Somebody'.PIPER,JOHN STEPHEN.2011-07-17.https://bit.ly/2r31InJ|'He who sings prays twice.'.Hipponensis,Aurelius Augustinus.430-02-30.https://bit.ly/2JwSHuH
 |'The task of the modern educator is not to cut down jungles but to irrigate deserts.'.LEWIS,CLIVE STAPLES.1943-09-23.https://bit.ly/2HwPJd6
 |'There is not one blade of grass, there is no color in this world that is not intended to make us rejoice.'.Calvin,John C.1530-10-09.https://www.brainyquote.com/authors/john_calvin|
 'The worth and excellency of a soul is to be measured by the object of its love.'.SCOUGAL,HENRY P.1678-08-23.https://bit.ly/2Kh1VMR
 |'It is not the strength of your faith but the object of your faith that actually saves you.'.KELLER,TIMOTHY J.2013-01-14.https://bit.ly/2I0WocO
 |'Truth is the agreement of our ideas with the ideas of God.'.Edwards,Jonathan Prtn.1703-09-23.https://bit.ly/2HSMz2U
 |'Each day we are becoming a creature of splendid glory or one of unthinkable horror.'.LEWIS,CLIVE STAPLES.1952-02-01.https://bit.ly/2HwPJd6|'At your right hand are pleasures evermore..'.David,Jesse soun.1200-09-29.https://www.google.com|'Tolerance is not about not having beliefs. It is about how your beliefs lead you to treat people who disagree with you.'.KELLER,TIMOTHY J.2015-10-23.https://bit.ly/2I0WocO
 |'It is better to lose your life than to waste it.'.PIPER,JOHN STEPHEN.2000-05-33.https://bit.ly/2r31InJ|
 'It is not opinions that man needs: it is TRUTH...'.Bonar Horatius B.1885-02-12.https://www.goodreads.com/author/quotes/133605.Horatius_Bonar|
 'Nothing could be more irrational than the idea that something comes from nothing.'.SPROUL,CHARLES ROBERT.2006-03-23.https://bit.ly/2HQ4TJV
 |'He is no fool who gives what he cannot keep to gain that which he cannot lose.'.Elliot,James Phillip.1944-07-26.https://www.brainyquote.com/authors/jim_elliot
";

  $quotes_array = explode('|',$quotes);

  array_walk($quotes_array,'getcsv_custom2');

  echo '<ol type="a" >';

  $quotes_counter = 0;

  $authors_array = [];
  foreach($quotes_array as $key => $value){
      echo '<li>';

      $url_pieces = array_splice($value, 3);

      $url_string = implode('.',$url_pieces);
      foreach( $value as $key2 => $value2 ):

        if( $key2 == 0 ):
          $quote = $value2;

        elseif( $key2 == 1 ):
          $nm_return = order_names($value2,$url_string,true);
          $name = $nm_return[0];
          $surname = $nm_return[1];

          if( !in_array($surname, $authors_array) ):
            array_push($authors_array, $surname);
          endif;

        elseif( $key2 == 2):
          $quote_year = date('Y',strtotime($value2));

          echo "<span class='quotes_galore'>\"{$quote}\"</span> - ".$name." ({$quote_year}).";
        endif;
      endforeach;
      echo '</li>';

      $quotes_counter++;
  }
?>

</ol>
<p class="uline">Summary</p>
<ul class="dashed">

  <li>Total names : <?= $quotes_counter; ?> quotes</li>
  <li>Total unique authors : <?= count($authors_array) .' ('.implode(',',$authors_array);?>)</li>
<ul>
</body>
</html>
-
