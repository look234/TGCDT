# TGCDT
The Giant Checklist Database Thing

To do:
* Finish initial Set List display.
* Combine test_card_text_grab.php into database_var.php, this was initially seperated to test speeding up loading times by calling for card text only when needed.
* Update mysql functions to mysqli.
* Check for any unsecure $_POST variables and fix them.
* Reduce repeated DB connections.
* Figure out workaround for the repeated include files in each Series directory. This is currently donw to allow the jQuery load() calls to access the file in the parent directory. Looking into Access Control CORS for solutions https://developer.mozilla.org/en-US/docs/Web/HTTP/Access_control_CORS .
* Implement the automatic admin card adder to all basic Series. PTCG and YGO currently have custom built card adders.
* Build initail user setting page to allow for specific uasge style.
* Build blank tempalte folder to initialize future Series.


Sometime in the future:
* Add more Series. -_-'
* Build scrappers to gather urls for other trading card shopping sites to add to list of possible vendors and to help add card pricing info.
* Add deck building feature.
* Add filters for current card legalities for active series.
* Create tutorial for basic usage.
