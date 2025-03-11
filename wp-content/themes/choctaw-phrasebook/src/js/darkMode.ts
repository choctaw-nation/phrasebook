import Cookies from 'js-cookie';

/**
 * Controls Dark Mode by setting a data-attribute on the Root element based on user preference or cookie
 */
export default class DarkMode {
	/** Color mode cookie */
	private cookie;

	/** Color mode toggle */
	private toggle: HTMLInputElement;

	/** valid color mode options */
	private colorMode: 'dark' | 'light';

	constructor() {
		this.cookie = Cookies.get( 'bsDarkMode' );
		this.setColorMode();
		const toggle = document.getElementById( 'color-toggle-switch' );
		if ( toggle ) {
			this.toggle = toggle as HTMLInputElement;
			this.toggle.addEventListener( 'change', ( ev ) => {
				const target = ev.target as HTMLInputElement;
				this.colorMode = target.checked ? 'dark' : 'light';
				this.setColorScheme( true );
			} );
			this.setColorScheme( true );
		} else {
			this.setColorScheme();
		}
	}

	/**
	 * If there is no cookie, set `this.colorMode` to user preference, otherwise use cookie value */
	private setColorMode() {
		if ( ! this.cookie || 'undefined' === this.cookie ) {
			this.colorMode = window.matchMedia( '(prefers-color-scheme: dark)' )
				.matches
				? 'dark'
				: 'light';
		} else {
			this.colorMode = this.cookie;
		}
	}

	/**
	 * Sets the Root Attribute Color scheme
	 */
	private setColorScheme( withToggle: boolean = false ) {
		const root = document.querySelector( 'html' );
		if ( ! root ) {
			return;
		}
		root.setAttribute( 'data-bs-theme', this.colorMode );
		if ( withToggle ) {
			this.setToggleState();
			this.setCookie();
		}
	}

	/** Updates the Toggle's state based on `this.colorMode` prop */
	private setToggleState() {
		this.toggle.checked = 'dark' === this.colorMode;
	}

	/**
	 * Sets the color mode to a cookie that expires in 3 days
	 */
	private setCookie() {
		const cookieOptions = {
			expires: 3, // 3 day expiry
			path: '/',
		};

		Cookies.set( 'bsDarkMode', this.colorMode, cookieOptions );
	}
}
