jQuery(document).ready(function($) {
	// Append update to pro button
    $('.preview-notice').append(
        '<a class="boston-business-upgrade-to-pro-button" href="http://www.creativthemes.com/downloads/boston-business-pro/" class="button" target="_blank">{pro}</a>'
        .replace('{pro}',
        updateButtonObj.pro
    ) );
});