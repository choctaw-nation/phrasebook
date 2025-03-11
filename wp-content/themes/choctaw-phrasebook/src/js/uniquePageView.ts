import Cookies from 'js-cookie';
declare global {
	interface Window {
		dataLayer: Array< any >;
	}
}
/**
 * Analytics Tracking
 *
 * Enhancements for Google Analytics 4
 */
export default class GTMPageViews {
	private dataLayer;
	constructor() {
		this.dataLayer = window.dataLayer;
		const cookie = Cookies.withAttributes( {
			path: '/',
			domain: location.hostname,
			secure: true,
			expires: 30,
		} );

		// Record unique pageviews in an array
		let uniquePageviews = cookie.get( 'unique-pageviews' );
		if ( uniquePageviews ) {
			uniquePageviews = JSON.parse( uniquePageviews );
		} else {
			uniquePageviews = [];
		}

		// Don't continue if the current page has already been viewed in this session
		if ( uniquePageviews.indexOf( location.href ) !== -1 ) {
			return;
		}

		// Track a page view for a newly visited URL in this session
		uniquePageviews.push( location.href );
		uniquePageviews = JSON.stringify( uniquePageviews );
		cookie.set( 'unique-pageviews', uniquePageviews );

		// Send "unique_page_view" event to GA4
		const properties = {
			event: 'unique_page_view',
			page_location: location.href,
			page_referrer: document.referrer,
		};
		this.dataLayer.push( properties );

		// Debug helper (optional)
		console.log( `"unique_page_view" tracked in GA4`, properties );
	}
}
