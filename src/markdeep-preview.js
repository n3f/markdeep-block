import { Component } from '@wordpress/element';

/**
 * Add external Markdeep dependencies
 */
import * as markdeep from 'markdeep';

export class MarkdeepPreview extends Component {
	constructor( props ) {
		super( ...arguments );
		this.state = {
			content: props.content ?? '',
			error: false,
		};
	}

	static getDerivedStateFromProps( props, state ) {
		let content = props.content;
		try {
			const html = markdeep.format( content );
			return { content: html, error: false };
		} catch ( e ) {
			return { error: true };
		}
	}

	initMarkdeepPreview() {
		let el = document.getElementById( this.props.id );
		el.innerHTML = this.state.content;
	}

	componentDidMount() {
		this.initMarkdeepPreview();
	}

	componentDidUpdate() {
		this.initMarkdeepPreview();
	}

	render() {
		return <div id={ this.props.id } />;
	}
}
