                    	<div class="loaded-section">
                            <h2>Register Member<span id="validationText"></span></h2>
                            <form id="search-form" action="" class="alignLeft">
                            	
                            <fieldset>
                            	<input id="search-member" type="text" value="" name="search-member" class="text" placeholder="Search by birthday first" />
                            </fieldset>
							</form>

                            <button id="search-button" name="search-button" value="Search">Search</button>
                        </div> <!-- End of .loaded-section -->
                        <div id="register-member-section" class="search-loaded-section loaded-section">
                            <h2>Search Results</h2>
                            <div class="search-results-wrap">
                                <ol id="search-results">
                                    <li>No members found</li>
                                </ol> <!-- End of .search-results-wrap -->
                            </div> <!-- End of #member-list -->
                        </div> <!-- End of .loaded-section -->
                        <script type="text/javascript" src="js/search.js"></script>
                        <script type="text/javascript">
                            $("#search-member").focus();
                        </script>