if (self.CavalryLogger) { CavalryLogger.start_js(["sMxbv"]); }

__d("InstantGamesShareSurface",[],(function(a,b,c,d,e,f){e.exports=Object.freeze({CANVAS_TYPEAHEAD:"canvas_typeahead",FB_MOBILE_BOOKMARK:"fb_mobile_bookmark",GAMEROOM:"gameroom",WWW_AFTER_SHARE:"www_after_share",WWW_CONTEXT_CHOOSE:"www_context_choose",WWW_GAMES_HUB:"www_games_hub",WWW_HOVER_CARD:"www_hover_card"})}),null);
__d("XPlayWithFriendsShareController",["XController"],(function(a,b,c,d,e,f){e.exports=b("XController").create("/instantgames/playwithfriends/",{game_id:{type:"Int"},always_show_share_dialog:{type:"Bool",defaultValue:!1},source:{type:"Enum",enumType:1},__asyncDialog:{type:"Int"}})}),null);
__d("InstantGamesShareTypeahead.react",["cx","AsyncRequest","GamesTypeahead.react","InstantGamesShareSurface","React","XPlayWithFriendsShareController"],(function(a,b,c,d,e,f,g){"use strict";__p&&__p();var h;h=babelHelpers.inherits(a,b("React").PureComponent);h&&h.prototype;a.prototype.$1=function(a){a=b("XPlayWithFriendsShareController").getURIBuilder().setInt("game_id",a.getUniqueID()).setBool("always_show_share_dialog",!0).setEnum("source",b("InstantGamesShareSurface").CANVAS_TYPEAHEAD).getURI();new(b("AsyncRequest"))().setURI(a).send()};a.prototype.render=function(){return b("React").createElement(b("GamesTypeahead.react"),{className:"_21t1",clearOnSelect:!1,filterVideoTags:!1,includeSeries:!1,onGameSelect:this.$1,queryInstantGames:!0,showEntriesOnFocus:!0})};function a(){h.apply(this,arguments)}e.exports=a}),null);
__d("MessengerDialogCancelButton.react",["fbt","MessengerDialogButton.react","React"],(function(a,b,c,d,e,f,g){"use strict";var h;h=babelHelpers.inherits(a,b("React").PureComponent);h&&h.prototype;a.prototype.render=function(){return b("React").createElement(b("MessengerDialogButton.react"),babelHelpers["extends"]({action:"cancel",label:g._("Cancel"),type:"secondary"},this.props))};function a(){h.apply(this,arguments)}e.exports=a}),null);
__d("MessengerMenu.react",["cx","Keys","MenuSeparator.react","ReactXUIMenu","joinClasses"],(function(a,b,c,d,e,f,g){"use strict";__p&&__p();var h;function a(a){a.isReactLegacyFactory={},a.type=a}d=babelHelpers.inherits(c,b("ReactXUIMenu"));h=d&&d.prototype;function c(a){var c=a.className;a=babelHelpers.objectWithoutProperties(a,["className"]);h.constructor.call(this,babelHelpers["extends"]({className:b("joinClasses")(c,"_2i-c _150g")},a))}c.prototype.handleKeydown=function(a,c){return a===b("Keys").DOWN||a===b("Keys").UP||a===b("Keys").SPACE?h.handleKeydown.call(this,a,c):!0};a(c);c.Item=b("ReactXUIMenu").Item;c.Separator=b("MenuSeparator.react");e.exports=c}),null);
__d("MessengerScrollableArea.react",["cx","JSReliabilityFixesGatingConfig","React","ReactDOM","ScrollableArea.react","Style","UserAgent","clearImmediate","joinClasses","setImmediate","throttle"],(function(a,b,c,d,e,f,g){"use strict";__p&&__p();var h,i=20;c=babelHelpers.inherits(a,b("React").Component);h=c&&c.prototype;function a(a){__p&&__p();h.constructor.call(this,a),this.$1=!1,this.$2=null,this.$4=function(){if(this.$1){var a;this.props.onScroll&&(a=this.props).onScroll.apply(a,arguments)}}.bind(this),this.$5=function(){__p&&__p();if(!b("UserAgent").isBrowser("IE"))return;if(b("JSReliabilityFixesGatingConfig").should_get_fix&&(!this.refs||!this.refs.scrollable))return;var a=this.refs.scrollable.refs.wrap,c=this.refs.scrollable.refs.body;if(!c||!a)return;c=b("ReactDOM").findDOMNode(c);a=b("ReactDOM").findDOMNode(a);a=a.offsetWidth-a.clientWidth;a>0&&b("Style").set(c,"margin-right",-a+"px")}.bind(this),this.$3=b("throttle")(this.$4,50)}a.prototype.componentDidMount=function(){this.$2=b("setImmediate")(this.$5),this.$1=!0};a.prototype.componentWillUnmount=function(){b("clearImmediate")(this.$2),this.$1=!1};a.prototype.render=function(){var a=this.props.needsFastScrollHandler?this.$4:this.$3;return b("React").createElement(b("ScrollableArea.react"),{className:b("joinClasses")("_5f0v",this.props.className),height:this.props.height,onScroll:a,ref:"scrollable",shadow:!1,tabIndex:this.props.tabIndex,width:this.props.width},this.props.children)};a.prototype.getArea=function(){return this.refs.scrollable.getArea()};a.prototype.scrollToBottom=function(){var a=this.getArea();a&&this.scrollToPosition(a.getScrollHeight())};a.prototype.scrollToTop=function(a){var b=this.getArea();b&&b.scrollToTop(!!a)};a.prototype.scrollToPosition=function(a){var b=arguments.length<=1||arguments[1]===undefined?!1:arguments[1],c=arguments.length<=2||arguments[2]===undefined?{}:arguments[2],d=this.getArea();if(!d)return;d.setScrollTop(a,b,c)};a.prototype.isScrolledToBottom=function(){return this.isScrolledToBottomWithHeight(0)};a.prototype.isScrolledToBottomWithHeight=function(a){var b=this.getArea();return!b?!1:b.getScrollTop()+b.getClientHeight()+a>=b.getScrollHeight()-i};a.prototype.isScrolledToTop=function(){var a=this.getArea();return!a?!0:a.getScrollTop()<=i};a.prototype.getScrollTop=function(){var a=this.getArea();return!a?0:a.getScrollTop()};e.exports=a}),null);
__d("Bootload.bs",["bs_curry"],(function(a,b,c,d,e,f){"use strict";function a(a){var c=function(c){return b("bs_curry")._1(a[0],function(a){return b("bs_curry")._1(c,a.bootloadable)})};return[c]}f.Create=a}),null);
__d("CustomColorHighlightingReact.bs",["ReasonReact.bs","bs_js_null_undefined","CustomColorHighlighting.react"],(function(a,b,c,d,e,f){"use strict";function a(a,c){return b("ReasonReact.bs").wrapJsForReason(b("CustomColorHighlighting.react"),{customColor:b("bs_js_null_undefined").fromOption(a)},c)}f.make=a}),null);
__d("MessengerDialogReact.bs",["ReasonReact.bs","bs_js_null_undefined","MessengerDialog.react","MessengerDialogTitle.react","MessengerDialogButton.react","MessengerDialogFooter.react","MessengerDialogHeader.react","MessengerDialogCancelButton.react"],(function(a,b,c,d,e,f){"use strict";__p&&__p();function g(a){if(a)switch(a[0]){case 0:return["cancel"];case 1:return["button"];case 2:return["confirm"]}else return 0}function h(a){if(a)if(a[0])return["secondary"];else return["primary"];else return 0}function a(a,c,d,e,f,g,h,i){return b("ReasonReact.bs").wrapJsForReason(b("MessengerDialog.react"),{className:b("bs_js_null_undefined").fromOption(a),onToggle:c,repositionOnUpdate:b("bs_js_null_undefined").fromOption(d),shown:b("bs_js_null_undefined").fromOption(e),titleID:b("bs_js_null_undefined").fromOption(f),type:b("bs_js_null_undefined").fromOption(g),width:b("bs_js_null_undefined").fromOption(h)},i)}a=[a];function c(a,c,d){return b("ReasonReact.bs").wrapJsForReason(b("MessengerDialogHeader.react"),{className:b("bs_js_null_undefined").fromOption(a),id:b("bs_js_null_undefined").fromOption(c)},d)}c=[c];function d(a,c){return b("ReasonReact.bs").wrapJsForReason(b("MessengerDialogTitle.react"),{className:b("bs_js_null_undefined").fromOption(a)},c)}d=[d];function e(a,c,d){return b("ReasonReact.bs").wrapJsForReason(b("MessengerDialogFooter.react"),{className:b("bs_js_null_undefined").fromOption(a),leftContent:b("bs_js_null_undefined").fromOption(c)},d)}e=[e];function i(a,c){return b("ReasonReact.bs").wrapJsForReason(b("MessengerDialogCancelButton.react"),{onClick:b("bs_js_null_undefined").fromOption(a)},c)}i=[i];function j(a,c,d,e,f,i,j,k,l){return b("ReasonReact.bs").wrapJsForReason(b("MessengerDialogButton.react"),{action:b("bs_js_null_undefined").fromOption(g(a)),label:b("bs_js_null_undefined").fromOption(c),disabled:b("bs_js_null_undefined").fromOption(d),use:b("bs_js_null_undefined").fromOption(e),onClick:b("bs_js_null_undefined").fromOption(f),type:b("bs_js_null_undefined").fromOption(h(i)),className:b("bs_js_null_undefined").fromOption(j),leftContent:b("bs_js_null_undefined").fromOption(k)},l)}j=[j];var k=0;f.stringOfButtonAction=g;f.stringOfButtonType=h;f.Dialog=a;f.Header=c;f.Title=d;f.Footer=e;f.CancelButton=i;f.Button=j;f.Body=k}),null);
__d("MessengerScrollableAreaReact.bs",["ReasonReact.bs","bs_js_null_undefined","MessengerScrollableArea.react"],(function(a,b,c,d,e,f){"use strict";function a(a,c){return b("ReasonReact.bs").wrapJsForReason(b("MessengerScrollableArea.react"),{height:b("bs_js_null_undefined").fromOption(a)},c)}f.make=a}),null);
__d("AddCommentFlyoutSizeType",[],(function(a,b,c,d,e,f){a={LARGE:"large",SMALL:"small"};e.exports=a}),null);
__d("QuicksilverSources",[],(function(a,b,c,d,e,f){e.exports=Object.freeze({CUSTOM_SHARE:"in_game_custom_share",EMBEDDED_PLAYER:"embedded_player",FB_CANVAS:"fb_canvas",FB_FEED:"fb_feed",FB_FEED_EGO:"fb_ego_igyml",FB_FEED_PLAY_FROM_POST_EDGE_STORY:"fb_feed_play_from_post_edge_story",FB_FEED_RATING:"fb_feed_rating",FB_FEED_SCREENSHOT:"fb_feed_screenshot",FB_SCORE_PASSED_NOTIF:"fb_score_passed_notif",FB_SEARCH:"big_blue_search",FB_FEED_IGYML_QP:"fb_qp_igyml",FB_FEED_IGYFAP_QP:"fb_qp_igyfap",FB_FEED_NEW_RELEASES_QP:"fb_qp_new_releases",FB_FEED_PLAY_WITH_FRIENDS:"fb_feed_play_with_friends",FB_FEED_PLAYING_WITH_FRIENDS_QP:"fb_qp_playing_with_friends",FB_FEED_PLAYED_RECENTLY_QP:"fb_qp_played_recently",FB_FEED_LEADERBOARD_HIGH_SCORE:"fb_feed_leaderboard_high_score",FB_FEED_LIVE_VIDEO:"fb_feed_live_video",FB_FEED_QUICK_PROMOTION:"fb_feed_quick_promotion",FB_AD:"fb_ad",FB_GROUP_CHALLENGE:"fb_group_challenge",FB_GROUP_COMPOSER:"fb_group_composer",FB_GROUP_GAMES_TAB:"fb_group_games_tab",FB_GROUP_MALL:"fb_group_mall",FB_GROUP_MALL_EGO:"fb_group_mall_ego",FB_GROUP_MALL_SCREENSHOT:"fb_group_mall_screenshot",FB_GROUP_NEWS_FEED:"fb_group_news_feed",FB_GROUP_NEWSFEED_SCREENSHOT:"fb_group_newsfeed_screenshot",FB_GROUP_RHC_LEADERBOARD:"fb_group_rhc_leaderboard",FB_GROUP_SCORE_PASSED_NOTIF:"fb_group_score_passed_notif",FB_GROUP_POST_ACTION_LINK:"fb_group_post_action_link",FB_GROUP_POST_CONTEXT_UPDATE:"fb_group_post_context_update",FB_HOMESCREEN_SHORTCUT:"fb_homescreen_shortcut",FB_MESSENGER_AD:"fb_messenger_ad",FB_PAGE_PLAY_GAME_BUTTON:"fb_page_play_game_button",FB_STORY_ATTRIBUTION_LINK:"fb_story_attribution_link",GAMEROOM_FEED_POST:"gameroom_feed_post",GAMEROOM_HOME:"gameroom_home",GAME_CTA:"game_cta",GAME_SWITCH:"game_switch",HOME_SCREEN_SHORTCUT:"home_screen_shortcut",INTERNAL:"internal",LIVE_VIDEO_CTA:"live_video_cta",M_ME_LINK:"m_me_link",MESSENGER_AD:"messenger_ad",MESSENGER_ADMIN_MESSAGE:"admin_message",MESSENGER_BOT_MENU:"bot_menu",MESSENGER_BUSINESS_ATTACHMENT:"business_attachment",MESSENGER_CALL_TO_ACTION:"call_to_action",MESSENGER_COMPOSER:"composer",MESSENGER_CUSTOM_ADMIN_MESSAGE:"custom_admin_message",MESSENGER_GAME_BOT_MENU:"game_bot_menu",MESSENGER_GAME_EMOJI:"game_emoji",MESSENGER_GAME_SHARE:"game_share",MESSENGER_GAME_SCORE_SHARE:"game_score_share",MESSENGER_GAME_SEARCH:"search",MESSENGER_GAME_THREAD_ROW_CTA:"game_thread_row_cta",MESSENGER_GAMES_HUB:"games_hub",MESSENGER_RTC:"rtc",MESSENGER_SEARCH:"messenger_search",MARKETPLACE:"marketplace",MOBILE_BOOKMARK:"mobile_bookmark",MSITE_BOOKMARK:"msite_bookmark",MOBILE_APP_BOOKMARK:"mobile_app_bookmark",MOBILE_BOOKMARK_PRESENCE:"mobile_bookmark_presence",MSITE:"msite",PRESENCE_ON_MESSENGER:"presence_on_messenger",THREAD_ACTIVITY_BANNER:"thread_activity_banner",THREAD_SETTINGS:"thread_settings",WWW_BOOKMARK:"www_bookmark",WWW_APP_CENTER_BROWSE:"www_app_center_browse",WWW_APP_CENTER_CHALLENGE:"www_app_center_challenge",WWW_APP_CENTER_MAIN:"www_app_center_main",WWW_GAMES_HUB:"www_games_hub",WWW_GAMES_HUB_SEARCH:"www_games_hub_search",WWW_GAMES_DIVEBAR_PAGELET:"www_games_divebar_pagelet",WWW_GAMES_RHC_PAGELET:"www_games_rhc_pagelet",WWW_GAMES_UNIFIED_RHC:"www_games_unified_rhc",WWW_LINK_SHARE:"www_link_share",WWW_MESSENGER_UPSELL:"www_messenger_upsell",WWW_PLAY_URL:"www_play_url",WWW_REQUEST_HOVERCARD:"www_request_hovercard",WWW_SPOTLIGHT_RHC:"www_spotlight_rhc",WWW_CHAT_SIDEBAR_PRESENCE:"www_chat_sidebar_presence",WWW_GAME_THREAD_ROW_CTA:"www_game_thread_row_cta",WWW_APP_BOOKMARK:"www_app_bookmark",CANVAS_DIVEBAR:"canvas_divebar",CANVAS_GAME_MODAL:"canvas_game_modal",UNKNOWN:"unknown"})}),null);
__d("BootloadOnInteraction.react",["BootloadOnRender.react","React"],(function(a,b,c,d,e,f){__p&&__p();var g;c=babelHelpers.inherits(a,b("React").Component);g=c&&c.prototype;function a(a){"use strict";g.constructor.call(this,a),this.$1=function(){this.setState({hadUserInteraction:!0})}.bind(this),this.state={hadUserInteraction:!1}}a.prototype.render=function(){"use strict";if(!this.state.hadUserInteraction)return b("React").cloneElement(this.props.placeholder,{onFocus:this.$1,onMouseOver:this.$1,onClick:this.$1});var a=this.props,c=a.loader,d=a.component;a=a.placeholder;return b("React").createElement(b("BootloadOnRender.react"),{placeholder:a,loader:c,component:d})};e.exports=a}),null);
__d("bs_marshal",["bs_caml_string","bs_caml_missing_polyfill","bs_caml_builtin_exceptions"],(function(a,b,c,d,e,f){"use strict";__p&&__p();function a(a,c,d,e,f){if(c<0||d<0||c>(a.length-d|0))throw[b("bs_caml_builtin_exceptions").invalid_argument,"Marshal.to_buffer: substring out of bounds"];else return b("bs_caml_missing_polyfill").not_implemented("caml_output_value_to_buffer")}function g(a,c){if(c<0||c>(a.length-20|0))throw[b("bs_caml_builtin_exceptions").invalid_argument,"Marshal.data_size"];else return b("bs_caml_missing_polyfill").not_implemented("caml_marshal_data_size")}function c(a,b){return 20+g(a,b)|0}function h(a,c){if(c<0||c>(a.length-20|0))throw[b("bs_caml_builtin_exceptions").invalid_argument,"Marshal.from_bytes"];else{var d=b("bs_caml_missing_polyfill").not_implemented("caml_marshal_data_size");if(c>(a.length-(20+d|0)|0))throw[b("bs_caml_builtin_exceptions").invalid_argument,"Marshal.from_bytes"];else return b("bs_caml_missing_polyfill").not_implemented("caml_input_value_from_string")}}function d(a,c){return h(b("bs_caml_string").bytes_of_string(a),c)}function e(a,c,d){return b("bs_caml_missing_polyfill").not_implemented("caml_output_value")}function i(){return b("bs_caml_missing_polyfill").not_implemented("caml_input_value")}var j=20;f.to_channel=e;f.to_buffer=a;f.from_channel=i;f.from_bytes=h;f.from_string=d;f.header_size=j;f.data_size=g;f.total_size=c}),null);
__d("bs_obj",["bs_marshal","bs_caml_array","bs_caml_missing_polyfill","bs_caml_builtin_exceptions"],(function(a,b,c,d,e,f){"use strict";__p&&__p();var g=b("bs_caml_array").caml_array_get,h=b("bs_caml_array").caml_array_set;function a(){return b("bs_caml_missing_polyfill").not_implemented("caml_output_value_to_string")}function c(a,c){return[b("bs_marshal").from_bytes(a,c),c+b("bs_marshal").total_size(a,c)|0]}function i(a){a=a.length!==undefined&&(a.tag|0)!==248&&a.length>=1?a[0]:a;var c;if(a.length!==undefined&&a.tag===248)c=a[0];else throw b("bs_caml_builtin_exceptions").not_found;if(c.tag===252)return a;else throw b("bs_caml_builtin_exceptions").not_found}function d(a){try{a=i(a);return a[0]}catch(a){if(a===b("bs_caml_builtin_exceptions").not_found)throw[b("bs_caml_builtin_exceptions").invalid_argument,"Obj.extension_name"];else throw a}}function e(a){try{a=i(a);return a[1]}catch(a){if(a===b("bs_caml_builtin_exceptions").not_found)throw[b("bs_caml_builtin_exceptions").invalid_argument,"Obj.extension_id"];else throw a}}function j(a){try{return i(a)}catch(a){if(a===b("bs_caml_builtin_exceptions").not_found)throw[b("bs_caml_builtin_exceptions").invalid_argument,"Obj.extension_slot"];else throw a}}var k=0,l=245,m=246,n=247,o=248,p=249,q=250,r=251,s=251,t=252,u=253,v=254,w=255,x=255,y=1e3,z=1001,A=1002;f.double_field=g;f.set_double_field=h;f.first_non_constant_constructor_tag=k;f.last_non_constant_constructor_tag=l;f.lazy_tag=m;f.closure_tag=n;f.object_tag=o;f.infix_tag=p;f.forward_tag=q;f.no_scan_tag=r;f.abstract_tag=s;f.string_tag=t;f.double_tag=u;f.double_array_tag=v;f.custom_tag=w;f.final_tag=x;f.int_tag=y;f.out_of_heap_tag=z;f.unaligned_tag=A;f.extension_name=d;f.extension_id=e;f.extension_slot=j;f.marshal=a;f.unmarshal=c}),null);
__d("bs_camlinternalLazy",["bs_obj","bs_curry","bs_caml_exceptions"],(function(a,b,c,d,e,f){"use strict";__p&&__p();var g=b("bs_caml_exceptions").create("CamlinternalLazy.Undefined");function h(){throw g}function i(a){__p&&__p();var c=a[0];a[0]=h;try{c=b("bs_curry")._1(c,0);a[0]=c;a.tag=b("bs_obj").forward_tag;return c}catch(b){a[0]=function(){throw b};throw b}}function j(a){var c=a[0];a[0]=h;c=b("bs_curry")._1(c,0);a[0]=c;a.tag=b("bs_obj").forward_tag;return c}function a(a){var c=a.tag|0;if(c===b("bs_obj").forward_tag)return a[0];else if(c!==b("bs_obj").lazy_tag)return a;else return i(a)}function c(a){var c=a.tag|0;if(c===b("bs_obj").forward_tag)return a[0];else if(c!==b("bs_obj").lazy_tag)return a;else return j(a)}f.Undefined=g;f.force_lazy_block=i;f.force_val_lazy_block=j;f.force=a;f.force_val=c}),null);
__d("XGamesDesktopAppDownloadController",["XController"],(function(a,b,c,d,e,f){e.exports=b("XController").create("/games/desktopapp/download/",{app_id:{type:"Int"},fbsource:{type:"Int"},ref:{type:"String"},canvas_url:{type:"String"}})}),null);
__d("XGamesQuicksilverSpotlightPlayerController",["XController"],(function(a,b,c,d,e,f){e.exports=b("XController").create("/games/quicksilver/spotlight/",{app_id:{type:"String"},context_source_id:{type:"String"},context_type:{type:"Enum",enumType:1},analytics_info:{type:"TypeAssert"},source:{type:"String"},entry_point_data:{type:"String"},previous_app_id:{type:"String"}})}),null);