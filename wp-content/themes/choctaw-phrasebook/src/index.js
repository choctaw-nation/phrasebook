import './styles/main.scss';
import DarkMode from './js/darkMode';
import AudioPlayer from './js/audioPlayer';
import SearchFilter from './js/searchFilter';
import GTMPageViews from './js/uniquePageView';

const darkMode = new DarkMode();
const audioPlayer = new AudioPlayer();
window.audioPlayer = audioPlayer;
const searchFilterHandler = new SearchFilter();
const gtmPageViews = new GTMPageViews();
const searchFilter = document.querySelector( '.sf-field-search' );
// jQuery(document).ready(function ($) {
// 	$('.sf-input-text').change(function () {
// 		$('body').addClass('page-searched');
// 		var searchText = $(this).val();
// 		$('.sf-field-search .sf-input-text').val(searchText);
// 	});

// 	var text_val = $('.sf-input-text').val();
// 	if (text_val != '') {
// 		$('body').addClass('page-searched');
// 	}
// }); // jQuery End
// Add special character buttons
