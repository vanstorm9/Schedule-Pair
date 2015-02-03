	jQuery(document).ready(function(){
			$('#game_text').autocomplete({source:'autosuggest_game.php', minLength:2});
			$('#music_text').autocomplete({source:'autosuggest_music.php', minLength:2});
			$('#sport_text').autocomplete({source:'autosuggest_sport.php', minLength:2});
			$('#show_text').autocomplete({source:'autosuggest_show.php', minLength:2});
			$('#movie_text').autocomplete({source:'autosuggest_movie.php', minLength:2});
			$('#major_text').autocomplete({source:'autosuggest_major.php', minLength:2});
			$('#interest_text_1').autocomplete({source:'autosuggest_interest.php', minLength:2});
			$('#interest_text_2').autocomplete({source:'autosuggest_interest.php', minLength:2});
			$('#interest_text_3').autocomplete({source:'autosuggest_interest.php', minLength:2});
	});
 

	function load(adiv_tag, recieving_id){									
		if (window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();
		} else{
			xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
		}

		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
				<?php 
				$search_query = mysql_query("SELECT * FROM search_info");

				$j = 0;
				while($search_row = mysql_fetch_array($search_query)){	
				?>
					if (adiv_tag == <?php echo $j; ?>){
						document.getElementById("adiv_<?php echo $j;?>").innerHTML =  xmlhttp.responseText;
					}
				<?php
					$j++;
			}
				
				?>
				
				
		}
										
	}
										
	xmlhttp.open('GET','include.inc.php?i=' + recieving_id, true);
	xmlhttp.send();

}