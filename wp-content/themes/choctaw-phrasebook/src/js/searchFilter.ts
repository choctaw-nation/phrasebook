/**
 * Handles Search and Filter Logic & Extensions
 *
 * @since 2.0.0
 */
export default class SearchFilter {
	/** The Search and Filter Form ID */
	private id = 56;
	/** The Results Div */
	private resultsContainer: HTMLElement;
	/** The Search Form */
	private searchForm: HTMLFormElement;
	/** The Search Field */
	private textField: HTMLInputElement;

	constructor() {
		const container = document.getElementById(
			`search-filter-results-${ this.id }`
		);
		if ( container ) {
			this.resultsContainer = container;
			this.handleResultsContainerClasses();
		}
		const searchForm = document.getElementById(
			`search-filter-form-${ this.id }`
		);
		if ( searchForm ) {
			this.searchForm = searchForm as HTMLFormElement;
			this.textField = searchForm.querySelector(
				'.sf-input-text'
			) as HTMLInputElement;
			this.addSearchFormButtons();
		}
	}

	/**
	 *  Adds classes to containing div element of Results list
	 */
	private handleResultsContainerClasses() {
		const classes = [
			'row',	
		];
		this.resultsContainer.classList.add( ...classes );
	}

/** Adds Buttons and functionality around adding special characters to the search form */
private addSearchFormButtons() {
	const searchField = this.searchForm.querySelector('.sf-field-search');
	const characters = [
		{
			label: 'a̱',
			value: 'A',
		},
		{
			label: 'i̱',
			value: 'I',
		},
		{
			label: 'o̱',
			value: 'O',
		},
		{
			label: 'ʋ',
			value: 'ʋ',
		},
	];
	if (searchField) {
		console.error('Search field found');
		let buttonCount = 0;
		if (!searchField.querySelector('.sf-field-reset')) {
			searchField.insertAdjacentHTML(
				'afterend',
				`<li class="sf-field-reset" data-sf-field-name='reset' data-sf-field-type='reset' data-sf-field-input-type='button'>
					<input type='submit' value='Reset' name='_sf_reset' data-search-form-id='${
						this.id
					}' data-sf-submit-form='always' class="search-filter-reset add-letter-button p-1 ms-3 border border-primary rounded-4 mt-0" aria-label="Reset button on search" />
				</li>
				<li class="sf-add-special-character mt-0 pt-0 d-flex align-items-center">
					<button type="button" aria-label="information button" class="btn i rounded-circle px-2 me-1" data-bs-toggle="modal" data-bs-target="#infoModal"><i class="fa-solid fa-info fa-xl"></i></button>
					<div>
						${characters
							.map((character) => {
								// Add the button count as a class
								return this.specialCharacterButton(character);
							})
							.join('')}
					</div>
				</li>`
			);
		}
		this.searchForm.addEventListener(
			'click',
			this.handleButtons.bind(this)
		);
	} else {
		console.error('Search field not found');
	}
}

	/** Generates The Special Character buttons */
	private specialCharacterButton( { label, value } ): string {
		const classes = [
			'border',
			'border-1',
			'border-primary',
			'rounded-4',
			'p-0',
			'pb-1',
			'mt-1',
			'ms-1',
			'add-letter-button',
			`button-${ value }`,
		];
		const button = `<button aria-label="Choctaw Character ${ label }" class="${ classes.join(
			' '
		) }">${ label }</button>`;
		return button;
	}

	/** Updates the search field with the value of the button when a button is clicked */
	private handleButtons( ev ) {
		const { target } = ev as { target: HTMLElement };
		if (
			! target ||
			target.classList.contains( 'sf-add-special-character' )
		) {
			return;
		}
		const letter = target.innerText;
		this.textField.value += letter;
	}
}
