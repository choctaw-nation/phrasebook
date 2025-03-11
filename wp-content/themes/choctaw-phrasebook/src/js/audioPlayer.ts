/**
 * Creates a class that allows audio to be played
 */
export default class AudioPlayer {
	private audioPlayer: HTMLAudioElement;
	constructor() {
		const audioPlayer = document.getElementById(
			'audioPlayer'
		) as HTMLAudioElement;
		if ( ! audioPlayer ) {
			throw new Error( `Couldn't find audio player!` );
		}
		this.audioPlayer = audioPlayer;
	}

	/**
	 * The globally-accessible method to handle click events on a button
	 * @param button HTMLButtonElement
	 */
	handleClick( button: HTMLButtonElement ) {
		this.audioPlayer.src = button.value;
		this.audioPlayer.play();
	}
}
