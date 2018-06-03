if (self.CavalryLogger) { CavalryLogger.start_js(["X6+6u"]); }

__d("MessengerGCFParticipantItem.react",["cx","BackgroundImage.react","Badge.react","ImageBlock.react","Keys","LeftRight.react","Link.react","MercuryTypeaheadConstants","OnVisible.react","React","SearchableEntry","joinClasses"],(function(a,b,c,d,e,f,g){"use strict";__p&&__p();var h,i=40;c=babelHelpers.inherits(a,b("React").PureComponent);h=c&&c.prototype;function a(){var a,c;for(var d=arguments.length,e=Array(d),f=0;f<d;f++)e[f]=arguments[f];return c=(a=h.constructor).call.apply(a,[this].concat(e)),this.$4=function(event){this.props.onClick(this.props.entry)}.bind(this),this.$5=function(event){(event.keyCode===b("Keys").SPACE||event.keyCode===b("Keys").RETURN)&&(event.preventDefault(),this.$4(event))}.bind(this),this.onVisible=function(){this.props.onVisible(this.props.entry)}.bind(this),this.willUnmount=function(){this.props.onHidden(this.props.entry)}.bind(this),c}a.prototype.$1=function(){var a=this.props.entry;a=a.getPhoto();return a?b("React").createElement(b("BackgroundImage.react"),{className:"_65-6",width:i,height:i,backgroundSize:"cover",src:a}):b("React").createElement("div",null)};a.prototype.$2=function(){return this.props.entry.getTitle()};a.prototype.$3=function(){return this.props.entry.getSubtitle()};a.prototype.$6=function(){var a=this.props.entry.getType();return a===b("MercuryTypeaheadConstants").INTERNAL_BOT_PAGE_TYPE?b("React").createElement(b("Badge.react"),{type:"bot",size:"medium"}):null};a.prototype.componentWillUnmount=function(){this.willUnmount()};a.prototype.render=function(){var a=b("joinClasses")("_599m _2elt _5mne",this.props.className);return b("React").createElement(b("OnVisible.react"),{onVisible:this.onVisible,onHidden:this.willUnmount},b("React").createElement("li",{"aria-selected":this.props.selected,className:a,onMouseDown:this.$4,onKeyDown:this.$5,role:"option"},b("React").createElement(b("ImageBlock.react"),{spacing:"medium"},this.$1(),b("React").createElement(b("LeftRight.react"),null,b("React").createElement("div",null,b("React").createElement("div",{className:"_2em0 _599p"},this.$2(),this.$6()),b("React").createElement("div",{className:"_2em1 _599q"},this.$3())),b("React").createElement(b("Link.react"),{"aria-checked":this.props.selected,className:"_2elu"+(this.props.selected?" _2elv":""),href:"#",label:"",role:"checkbox",tabIndex:"0"})))))};e.exports=a}),null);
__d("MessengerGCFParticipantPicker.react",["cx","fbt","CenteredContainer.react","React","FDSSpinner.react"],(function(a,b,c,d,e,f,g,h){"use strict";var i;i=babelHelpers.inherits(a,b("React").PureComponent);i&&i.prototype;a.prototype.render=function(){return this.props.formattedEntries.length===0&&!this.props.loading?b("React").createElement(b("CenteredContainer.react"),{className:"_2pi1"},h._("No results")):b("React").createElement("ul",{className:"_61r_"},this.props.formattedEntries,b("React").createElement("li",{className:"_2elx"},this.props.loading?b("React").createElement(b("FDSSpinner.react"),null):null))};function a(){i.apply(this,arguments)}e.exports=a}),null);
__d("XReactComposerAudienceSelectorAttachmentBootstrapController",["XController"],(function(a,b,c,d,e,f){e.exports=b("XController").create("/react_composer/audience_selector/bootstrap/",{composer_id:{type:"String",required:!0},target_id:{type:"String",required:!0}})}),null);
__d("ReactComposerAudienceSelectorLazyAttachment.react",["ActorURI","Bootloader","React","ReactComposerAttachmentType","ReactComposerLoadableAttachmentBodyMixin","XReactComposerAudienceSelectorAttachmentBootstrapController"],(function(a,b,c,d,e,f){"use strict";a=b("React").PropTypes;c=b("React").createClass({displayName:"ReactComposerAudienceSelectorLazyAttachment",mixins:[b("ReactComposerLoadableAttachmentBodyMixin")],statics:{attachmentID:b("ReactComposerAttachmentType").AUDIENCE_SELECTOR},propTypes:{selected:a.bool},bootload:function(a){b("Bootloader").loadModules(["ReactComposerAudienceSelectorAttachmentContainer.react"],a,"ReactComposerAudienceSelectorLazyAttachment.react")},getBootstrapURI:function(){return b("ActorURI").create(b("XReactComposerAudienceSelectorAttachmentBootstrapController").getURIBuilder().setString("composer_id",this.context.composerID).setString("target_id",this.context.targetID).getURI(),this.context.actorID)}});e.exports=c}),null);
__d("ReactComposerAudienceSelectorNextButton.react",["cx","fbt","InlineBlock.react","React","SimpleNUXMessage","SimpleNUXMessageTypes","XUIAmbientNUX.react","XUIButton.react"],(function(a,b,c,d,e,f,g,h){"use strict";__p&&__p();var i;c=babelHelpers.inherits(a,b("React").Component);i=c&&c.prototype;function a(a){i.constructor.call(this,a),this.state={nuxShown:!b("SimpleNUXMessage").hasUserSeenMessage(b("SimpleNUXMessageTypes").COMPOSER_SHARESHEET)}}a.prototype.$1=function(){b("SimpleNUXMessage").markMessageSeenByUser(b("SimpleNUXMessageTypes").COMPOSER_SHARESHEET),this.setState({nuxShown:!1})};a.prototype.render=function(){return b("React").createElement(b("InlineBlock.react"),{className:"uiContextualLayerParent"},b("React").createElement(b("XUIButton.react"),{ref:"button",disabled:this.props.forceDisabled,className:"_1mf7",label:h._("Next"),onClick:this.props.onClick,use:"confirm"}),b("React").createElement(b("XUIAmbientNUX.react"),{contextRef:function(){return this.refs.button}.bind(this),shown:this.state.nuxShown,onCloseButtonClick:this.$1.bind(this)},h._("After you create your post, tap Next to choose who can see it")))};a.defaultProps={onClick:function(){},forceDisabled:!1};e.exports=a}),null);
__d("ReactComposerAudienceSelectorNextButtonContainer.react",["FunnelLogger","React","ReactComponentWithPureRenderMixin","ReactComposerAttachmentActions","ReactComposerAttachmentStore","ReactComposerAttachmentType","ReactComposerAudienceSelectorActions","ReactComposerAudienceSelectorFunnelLogginConstants","ReactComposerAudienceSelectorNextButton.react","ReactComposerAudienceStore","ReactComposerConfig","ReactComposerContextTypes","ReactComposerFeedPostButtonContainer.react","ReactComposerMediaUploadStore","ReactComposerPostDataUtils","ReactComposerPropsAndStoreBasedStateMixin","ReactComposerScrapedAttachmentStore","ReactComposerStatusStore","ReactComposerTaggerStore"],(function(a,b,c,d,e,f){"use strict";__p&&__p();var g=b("ReactComposerAudienceSelectorFunnelLogginConstants").FUNNEL_LOGGING_NAME,h=b("ReactComposerAudienceSelectorFunnelLogginConstants").SEE_NEXT_BUTTON,i=b("ReactComposerAudienceSelectorFunnelLogginConstants").TAP_NEXT_BUTTON;a=b("React").createClass({displayName:"ReactComposerAudienceSelectorNextButtonContainer",contextTypes:b("ReactComposerContextTypes"),mixins:[b("ReactComponentWithPureRenderMixin"),b("ReactComposerPropsAndStoreBasedStateMixin")(b("ReactComposerAudienceStore"),b("ReactComposerAttachmentStore"),b("ReactComposerScrapedAttachmentStore"),b("ReactComposerMediaUploadStore"),b("ReactComposerStatusStore"),b("ReactComposerTaggerStore"))],propTypes:{config:b("ReactComposerConfig").isRequired},statics:{calculateState:function(a,c,d){var e=d.actorID;c=c.config;d=d.targetID;return{collectionID:b("ReactComposerAudienceStore").getCollectionID(a),composerID:a,isUploading:b("ReactComposerMediaUploadStore").isUploading(a),selectedAttachment:b("ReactComposerAttachmentStore").getSelectedAttachmentID(a),data:b("ReactComposerPostDataUtils").getPostData({actorID:e,composerConfig:c,composerID:a,targetID:d})}}},UNSAFE_componentWillMount:function(){b("FunnelLogger").startFunnel(g),b("FunnelLogger").appendAction(g,h)},_isEmptyAttachment:function(){var a=b("ReactComposerAttachmentStore").getSelectedAttachmentID(this.context.composerID),c=b("ReactComposerTaggerStore").areAllTaggersEmpty(this.context.composerID),d=b("ReactComposerStatusStore").getMessageText(this.context.composerID);return a===b("ReactComposerAttachmentType").STATUS?d||!c?!1:!this.state.data.attachment:!1},_onClick:function(){b("FunnelLogger").appendAction(g,i),b("ReactComposerAudienceSelectorActions").setComposerAttachmentType(this.context.composerID,this.state.selectedAttachment),b("ReactComposerAttachmentActions").selectAttachment(this.context.composerID,b("ReactComposerAttachmentType").AUDIENCE_SELECTOR,!0,null,null,this.state.selectedAttachment)},render:function(){return this.state.collectionID?b("React").createElement(b("ReactComposerFeedPostButtonContainer.react"),this.props):b("React").createElement(b("ReactComposerAudienceSelectorNextButton.react"),babelHelpers["extends"]({},this.props,{forceDisabled:this.state.isUploading||this._isEmptyAttachment(),onClick:this._onClick}))}});e.exports=a}),null);
__d("ReactComposerSproutsPostToGroupsSelector.react",["ix","cx","fbt","React","ReactComposerGroupSelectorTabContainerGatedModule","fbglyph"],(function(a,b,c,d,e,f,g,h,i){"use strict";__p&&__p();var j,k=b("ReactComposerGroupSelectorTabContainerGatedModule").module;j=babelHelpers.inherits(a,b("React").Component);j&&j.prototype;a.prototype.render=function(){if(k){var a=i._("Post to Group"),c=g("123072");return b("React").createElement("span",{key:"group_selector",className:"_sg1"},b("React").createElement(k,{label:a,icon:c}))}return null};function a(){j.apply(this,arguments)}e.exports=a}),null);
__d("ReactFeedSproutsComposerX.react",["cx","Arbiter","BootloadedComponent.react","Bootloader","JSResource","LitestandComposer","React","ReactComposerAttachmentActions","ReactComposerAttachmentType","ReactComposerAudienceSelectorLazyAttachmentGatedModule","ReactComposerAudienceSelectorNextButtonContainerGatedModule","ReactComposerBodyContainer.react","ReactComposerContextProviderMixin","ReactComposerEvents","ReactComposerFeedMediaPostButtonContainer.react","ReactComposerFeedPostButtonContainer.react","ReactComposerGroupSearchTypeaheadContainerGatedModule","ReactComposerGroupSelectorTabContainerGatedModule","ReactComposerHeaderContainer.react","ReactComposerListLazyAttachment.react","ReactComposerLiveVideoLazyAttachment.react","ReactComposerLiveVideoPreviewButton.react","ReactComposerLoggingName","ReactComposerSproutsMediaSelector.react","ReactComposerMediaEagerAttachment.react","ReactComposerPlaceListLazyAttachment.react","ReactComposerQAndALazyAttachment.react","ReactComposerSharingSpacesSelectorAttachmentGatedModule","ReactComposerSproutsAlbumSelector.react","ReactComposerSproutsLiveVideoDialogSelector.react","ReactComposerSproutsPostToGroupsSelector.react","ReactComposerSproutsQAndASelector.react","ReactComposerSproutsStatusAndMediaSelector.react","ReactComposerStatusEagerAttachment.react","ReactComposerTaggerActions","ReactComposerTaggerType","ReactComposerWithSprouts.react","ReactComposerVisualPollLazyAttachment.react","ifRequired"],(function(a,b,c,d,e,f,g){__p&&__p();var h,i=b("ReactComposerAudienceSelectorLazyAttachmentGatedModule").module,j=b("ReactComposerAudienceSelectorLazyAttachmentGatedModule").shouldShowSharesheetNux,k=b("ReactComposerAudienceSelectorLazyAttachmentGatedModule").isCreateNewGroupTitleEnabled,l=b("ReactComposerAudienceSelectorNextButtonContainerGatedModule").module,m=b("ReactComposerGroupSearchTypeaheadContainerGatedModule").module,n=b("ReactComposerGroupSelectorTabContainerGatedModule").module,o=b("ReactComposerSharingSpacesSelectorAttachmentGatedModule").module;h=babelHelpers.inherits(a,b("React").Component);h&&h.prototype;a.prototype.getChildContext=function(){"use strict";return b("ReactComposerContextProviderMixin").staticGetChildContext(this.props)};a.prototype.componentDidMount=function(){"use strict";b("LitestandComposer").initComposer(this.props.contextConfig.composerID);var a=this.props.prefillConfig;a&&a.selectedAttachment&&(b("ReactComposerAttachmentActions").selectAttachment(this.props.contextConfig.composerID,a.selectedAttachment,a.shouldActivateSelectedAttachment,a.loggingName,null,a.proxiedAttachmentID),a.shouldActivateSelectedAttachment&&b("Arbiter").inform(b("ReactComposerEvents").ACTIVATE_ATTACHMENT+this.props.contextConfig.composerID));a&&a.selectedTagger&&b("ReactComposerTaggerActions").selectTagger(this.props.contextConfig.composerID,b("ReactComposerLoggingName").OTHERS,a.selectedTagger);this.$1()};a.prototype.render=function(){"use strict";var a=this.props.prefillConfig,c=this.$2(),d=c[0];c=c[1];return b("React").createElement(b("ReactComposerWithSprouts.react"),{defaultAttachmentOnExpand:b("ReactComposerAttachmentType").STATUS,innerProps:{className:"_5n2b",loggingConfig:this.props.config.loggingConfig,sproutsConfig:this.props.config.sproutsConfig,promotedSprout:this.props.config.sproutsPromotionConfig?this.props.config.sproutsPromotionConfig.sprout:null},expandOnInit:a&&a.expandSproutsOnInit},b("React").createElement(b("ReactComposerHeaderContainer.react"),this.props,d),this.$3(),this.$4(),this.$5(),b("React").createElement(b("ReactComposerBodyContainer.react"),{expanded:this.props.config.showExpandedComposer},c))};a.prototype.$6=function(){"use strict";__p&&__p();var a=this.props.config.attachmentsConfig,c=[];if(a[b("ReactComposerAttachmentType").STATUS].enabled){var d=[];a[b("ReactComposerAttachmentType").LIVE_VIDEO].enabled||d.push(b("ReactComposerAttachmentType").LIVE_VIDEO);c.push(b("React").createElement(b("ReactComposerSproutsStatusAndMediaSelector.react"),{key:b("ReactComposerLoggingName").STATUS_TAB_SELECTOR,alternativeAttachmentIDs:d,label:a[b("ReactComposerAttachmentType").STATUS].defaultTabTitle,statusOnly:this.props.contextConfig.gks&&this.props.contextConfig.gks.photoTab}));n&&c.push(b("React").createElement(b("ReactComposerSproutsPostToGroupsSelector.react"),{key:b("ReactComposerLoggingName").GROUP_SELECTOR}))}this.props.contextConfig.gks&&this.props.contextConfig.gks.photoTab&&c.push(b("React").createElement(b("ReactComposerSproutsMediaSelector.react"),{key:b("ReactComposerLoggingName").MEDIA_TAB_SELECTOR,config:this.props.config}));d=this.props.contextConfig.gks&&this.props.contextConfig.gks.hideAlbumTab;if(a[b("ReactComposerAttachmentType").ALBUM].enabled&&!d){d=this.props.contextConfig.gks&&this.props.contextConfig.gks.albumTabUsesSelector;c.push(b("React").createElement(b("ReactComposerSproutsAlbumSelector.react"),{key:b("ReactComposerLoggingName").ALBUM,config:this.props.config,useCollectionSelector:d}))}a[b("ReactComposerAttachmentType").LIVE_VIDEO].enabled&&c.push(b("React").createElement(b("ReactComposerSproutsLiveVideoDialogSelector.react"),{key:b("ReactComposerLoggingName").LIVE_VIDEO_TAB_SELECTOR,contextConfig:this.props.contextConfig,config:this.props.config}));a[b("ReactComposerAttachmentType").QANDA].enabled&&c.push(b("React").createElement(b("ReactComposerSproutsQAndASelector.react"),{key:b("ReactComposerLoggingName").QANDA_TAB_SELECTOR}));return c};a.prototype.$2=function(){"use strict";__p&&__p();var a=this.$6(),b=[];b.push(this.$7());b.push(this.$8());b.push(this.$9());var c=this.$10();c&&b.push(c);c=this.$11();c&&b.push(c);c=this.$12();c&&b.push(c);c=this.$13();c&&b.push(c);c=this.$14();c&&b.push(c);c=this.$15();c&&b.push(c);b.push();return[a,b]};a.prototype.$7=function(){"use strict";var a=this.$16()===b("ReactComposerAttachmentType").STATUS,c=this.props.config.attachmentsConfig[b("ReactComposerAttachmentType").STATUS].placeholderText;return b("React").createElement(b("ReactComposerStatusEagerAttachment.react"),{key:"status",config:this.props.config,prefillConfig:this.props.prefillConfig,selected:a,postButtonModule:l?l:b("ReactComposerFeedPostButtonContainer.react"),placeholder:c})};a.prototype.$8=function(){"use strict";var a=this.$16()===b("ReactComposerAttachmentType").MEDIA;return b("React").createElement(b("ReactComposerMediaEagerAttachment.react"),{key:"media",config:this.props.config,postButtonModule:l?l:b("ReactComposerFeedMediaPostButtonContainer.react"),selected:a})};a.prototype.$13=function(){"use strict";var a=this.$16()===b("ReactComposerAttachmentType").LIST;return b("ReactComposerListLazyAttachment.react")?b("React").createElement(b("ReactComposerListLazyAttachment.react"),{key:b("ReactComposerAttachmentType").LIST,config:this.props.config,selected:a}):null};a.prototype.$12=function(){"use strict";var a=this.$16()===b("ReactComposerAttachmentType").VISUAL_POLL;return b("ReactComposerVisualPollLazyAttachment.react")?b("React").createElement(b("ReactComposerVisualPollLazyAttachment.react"),{key:b("ReactComposerAttachmentType").VISUAL_POLL,config:this.props.config,selected:a}):null};a.prototype.$9=function(){"use strict";var a=this.$16()===b("ReactComposerAttachmentType").LIVE_VIDEO;return b("React").createElement(b("ReactComposerLiveVideoLazyAttachment.react"),{key:"live_video",config:this.props.config,postButtonModule:b("ReactComposerLiveVideoPreviewButton.react"),selected:a})};a.prototype.$11=function(){"use strict";return!this.props.config.attachmentsConfig[b("ReactComposerAttachmentType").QANDA].enabled?null:b("React").createElement(b("ReactComposerQAndALazyAttachment.react"),{key:"qanda",config:this.props.config})};a.prototype.$14=function(){"use strict";var a=this.$16()===b("ReactComposerAttachmentType").AUDIENCE_SELECTOR;return i?b("React").createElement(i,{key:"audience_selector",config:this.props.config,selected:a,shouldShowSharesheetNux:j,isCreateNewGroupTitleEnabled:k}):null};a.prototype.$15=function(){"use strict";var a=this.$16()===b("ReactComposerAttachmentType").SHARING_SPACES_SELECTOR;a&&b("ifRequired")("ReactComposerCollectionsStore",function(a){a.loadCollections(this.props.contextConfig.composerID)}.bind(this));return o?b("React").createElement(o,{config:this.props.config,key:"sharingSpacesSelectorAttachment",selected:a}):null};a.prototype.$10=function(){"use strict";var a=this.$16()===b("ReactComposerAttachmentType").PLACE_LIST;return b("ReactComposerPlaceListLazyAttachment.react")?b("React").createElement(b("ReactComposerPlaceListLazyAttachment.react"),{key:b("ReactComposerAttachmentType").PLACE_LIST,config:this.props.config,bootload:function(a){return b("Bootloader").loadModules(["ReactFeedComposerPlaceListAttachmentContainer.react","ReactComposerPlaceListPostButtonContainer.react"],a,"ReactFeedSproutsComposerX.react")},selected:a}):null};a.prototype.$3=function(){"use strict";return m?b("React").createElement(m,null):null};a.prototype.$4=function(){"use strict";var a=this.props.config.taggersConfig;if(a&&a[b("ReactComposerTaggerType").FUN_FACT]&&a[b("ReactComposerTaggerType").FUN_FACT].enabled){a=this.props.contextConfig.extraConfig;return b("React").createElement(b("BootloadedComponent.react"),{bootloadLoader:b("JSResource")("ReactComposerFunFactSinglePromptTaggerContainer.react").__setRef("ReactFeedSproutsComposerX.react"),bootloadPlaceholder:b("React").createElement("div",null),entryPoint:a&&a.entryPoint,pinnedPromptID:a&&a.funFactPromptID})}return null};a.prototype.$5=function(){"use strict";var a=this.props.config.taggersConfig;if(a&&a[b("ReactComposerTaggerType").FUN_FACT]&&a[b("ReactComposerTaggerType").FUN_FACT].enabled){a=this.props.contextConfig.extraConfig;a&&a.funFactShowAskTagger&&b("ReactComposerTaggerActions").setTaggerData(this.props.contextConfig.composerID,b("ReactComposerLoggingName").FUN_FACT,b("ReactComposerTaggerType").FUN_FACT,{isAskPost:!0});return b("React").createElement(b("BootloadedComponent.react"),{bootloadLoader:b("JSResource")("ReactComposerFunFactAskPromptTaggerContainer.react").__setRef("ReactFeedSproutsComposerX.react"),bootloadPlaceholder:b("React").createElement("div",null),entryPoint:a&&a.entryPoint})}return null};a.prototype.$1=function(){var a=this,c=this.props.config.taggersConfig;c&&c[b("ReactComposerTaggerType").FUNDRAISER]&&c[b("ReactComposerTaggerType").FUNDRAISER].enabled&&(function(){var c=a.props.contextConfig.extraConfig&&a.props.contextConfig.extraConfig.charityID;c&&(function(){b("ReactComposerTaggerActions").setTaggerData(a.props.contextConfig.composerID,b("ReactComposerLoggingName").FUNDRAISER_SPROUT,b("ReactComposerTaggerType").FUNDRAISER,{charityID:c});var d=a.props.contextConfig.extraConfig&&a.props.contextConfig.extraConfig.promotionalSource;b("Bootloader").loadModules(["ReactComposerFundraiserAttachmentActions"],function(a){a.prefillFundraiserAttachment(this.props.contextConfig.composerID,c,this.props.contextConfig.actorID,d)}.bind(a),"ReactFeedSproutsComposerX.react")})()})()};a.prototype.$16=function(){"use strict";var a=this.props.prefillConfig;return a&&a.selectedAttachment?a.selectedAttachment:b("ReactComposerAttachmentType").STATUS};function a(){"use strict";h.apply(this,arguments)}a.childContextTypes=b("ReactComposerContextProviderMixin").childContextTypes;e.exports=a}),null);
__d("ReactFeedSproutsComposerXBootloader",["csx","SharesheetDestination","Arbiter","AsyncRequest","Bootloader","CSS","DOM","Event","PUWMethods","ReactComposerAttachmentActions","ReactComposerAttachmentType","ReactComposerEvents","ReactComposerInit","ReactComposerLoggingName","ReactComposerPrefillUtils","ReactComposerPromptsStore","ReactComposerTaggerActions","ReactComposerTaggerType","ReactFeedSproutsComposerX.react","ReactInputSelection","Run","SubscriptionsHandler","XReactComposerLoggingODSController","$","ge","getActiveElement","ifRequired"],(function(a,b,c,d,e,f,g){"use strict";__p&&__p();var h=void 0;a={_inputDOMs:[],_fileInputSubscriptions:b("SubscriptionsHandler"),_prefillSubscription:null,bootload:function(a,c){var d=b("$")("feedx_sprouts_container"),e=b("DOM").find(d,"._559p"),f=b("CSS").hasClass(e,"async_saving");f?(h=new(b("SubscriptionsHandler"))(),h.addSubscriptions(b("Event").listen(e,"success",function(){this._bootloadImpl(a,d,c)}.bind(this)),b("Event").listen(e,"error",function(){this._bootloadImpl(a,d,c)}.bind(this)))):this._bootloadImpl(a,d,c);b("Run").onLeave(this._cleanup.bind(this))},_bootloadImpl:function(a,c,d){__p&&__p();d.config.audienceXHP=this._getXHPToReactNode(c,"._ej0");var e=b("DOM").scry(c,"._16ve")[0],f=this._handlePendingMediaUploads(a,c,d,e);f=this._determineActiveAttachment(c,f);var g=!1;b("ifRequired")("ReactFeedSproutsComposerXBody",function(c){var e=c.getDroppedFiles();if(e.length>0){g=!0;var h=c.getDroppedAsset3DFile();h?(f=b("ReactComposerAttachmentType").STATUS,b("ReactComposerTaggerActions").setTaggerData(a,b("ReactComposerLoggingName").ASSET_3D,b("ReactComposerTaggerType").ASSET_3D,{file:h})):(f=b("ReactComposerAttachmentType").MEDIA,this._uploadExistingFiles(e,a,d));c.clearDroppedFiles()}c.setOnFilesDropCallback(function(){b("ReactComposerAttachmentActions").selectAttachment(a,b("ReactComposerAttachmentType").MEDIA,!0,b("ReactComposerLoggingName").MEDIA_SPROUT),this._uploadExistingFiles(c.getDroppedFiles(),a,d),c.clearDroppedFiles()}.bind(this))}.bind(this));e=e.getAttribute("data-selected-sprout-id");d.prefillConfig=Object.assign(d.prefillConfig,this._appendPrefillConfig(c,a,f,f==b("ReactComposerAttachmentType").SHARING_SPACES_SELECTOR?b("ReactComposerAttachmentType").STATUS:null,e,g));e=b("DOM").scry(c,"._66-n");e.forEach(function(a){a.dataset.destination==b("SharesheetDestination").STORIES?d.prefillConfig.storiesSelected=b("CSS").matchesSelector(a,"._1sfg"):a.dataset.destination==b("SharesheetDestination").TIMELINE&&(d.prefillConfig.timelineSelected=b("CSS").matchesSelector(a,"._1sfg"))});d.prefillConfig?(this._prefillSubscription=b("Arbiter").subscribeOnce(b("ReactComposerEvents").SET_PREFILL_DATA+a,function(){this._initComposer(d,c,a)}.bind(this)),b("ReactComposerPrefillUtils").prefill(a,d.prefillConfig)):this._initComposer(d,c,a)},_handlePendingMediaUploads:function(a,c,d,e){var f=!1;c=d.contextConfig.gks.photoTab?b("DOM").scry(c,'input[name="composer_photo[]"]'):b("DOM").scry(e,'input[name="composer_photo[]"]');this._subscriptions=new(b("SubscriptionsHandler"))();c.forEach(function(c){c&&(this._inputDOMs.push(c),this._subscriptions.addSubscriptions(b("Event").listen(c,"change",function(c){c=c.target;c.files&&c.files.length>0&&(this._uploadExistingFiles(c.files,a,d),b("ReactComposerAttachmentActions").selectAttachment(a,b("ReactComposerAttachmentType").MEDIA,!0,b("ReactComposerLoggingName").MEDIA_SPROUT))}.bind(this))),c.files&&c.files.length>0&&(f=!0,this._uploadExistingFiles(c.files,a,d)))}.bind(this));return f},_determineActiveAttachment:function(a,c){if(b("CSS").matchesSelector(b("DOM").find(a,"._1cx1"),"._2-q9"))return b("ReactComposerAttachmentType").SHARING_SPACES_SELECTOR;if(c)return b("ReactComposerAttachmentType").MEDIA;c=b("DOM").scry(a,"._5qtn")[0];return c&&c.getAttribute("data-attachment-type")===b("ReactComposerAttachmentType").LIVE_VIDEO?b("ReactComposerAttachmentType").LIVE_VIDEO:b("ReactComposerAttachmentType").STATUS},_initComposer:function(a,c,d){b("ReactComposerInit").init(b("ReactFeedSproutsComposerX.react"),a,c);c=b("XReactComposerLoggingODSController").getURIBuilder().setString("event","bootload_done").setEnum("composer_type",a.contextConfig.composerType).getURI();new(b("AsyncRequest"))(c).send();h&&h.release();b("Arbiter").inform("ReactFeedComposerXBootloader/bootload/"+d,a)},_appendPrefillConfig:function(a,c){var d=arguments.length<=2||arguments[2]===undefined?b("ReactComposerAttachmentType").STATUS:arguments[2],e=arguments.length<=3||arguments[3]===undefined?null:arguments[3],f=arguments.length<=4||arguments[4]===undefined?null:arguments[4],g=arguments.length<=5||arguments[5]===undefined?!1:arguments[5],h=b("DOM").find(a,"._3en1"),i=b("getActiveElement")()==h||b("CSS").hasClass(b("DOM").find(a,".focus_target"),"child_was_focused"),j=b("ge")("pagelet_composer")||b("ge")("content")||document,k=b("DOM").scry(j,"._1b3n").length!=0,l=b("CSS").matchesSelector(b("DOM").find(a,"._1cx1"),"._4qr4"),m={text:h.value},n=b("ReactComposerPromptsStore").getMinutiaeData(c),o=f;return{mentionsInput:{textWithEntities:m,selection:b("ReactInputSelection").getSelection(h)},selectedAttachment:g||k?d:undefined,shouldActivateSelectedAttachment:g||(i||!!n)&&!o,proxiedAttachmentID:e,taggersData:n,selectedTagger:o,expandSproutsOnInit:l}},_getXHPToReactNode:function(a,c){a=b("DOM").scry(a,c);if(a.length===0)return null;c=a[0];a=c.cloneNode(!0);c.parentNode.replaceChild(a,c);return c},_uploadExistingFiles:function(a,c,d){var e=d.config.attachmentsConfig[b("ReactComposerAttachmentType").MEDIA];b("Bootloader").loadModules(["ReactComposerMediaUtils","ReactComposerPhotoUploader"],function(f,g){f.uploadPhotosOrVideo(c,Array.prototype.slice.call(a),new g(d.contextConfig,e.photoLimit,{disableFaceRecognition:e.disableFaceboxTagger}),d.config.targetData.targetSupportsMultiplePhotos,b("PUWMethods").FILE_SELECTOR,d.config.targetData.targetSupportsMultiMedia,e)},"ReactFeedSproutsComposerXBootloader")},_cleanup:function(){this._subscriptions.release();for(var a=0;a<this._inputDOMs.length;a++)delete this._inputDOMs[a];delete this._inputDOMs;this._inputDOMs=[];this._prefillSubscription&&this._prefillSubscription.unsubscribe();this._prefillSubscription=null;b("ifRequired")("ReactFeedSproutsComposerXBody",function(a){a.cleanup()})}};e.exports=a}),null);
__d("ReactComposerSharingSpacesSelectorTimelineSection.react",["cx","React","ReactComposerAudienceSelectorContainer.react","SharingSpacesStrings","ShimButton.react","XUIText.react"],(function(a,b,c,d,e,f,g){"use strict";function a(a){return b("React").createElement("li",{className:"_1pek"+(a.isTwoStep?" _1099":"")},b("React").createElement(b("ShimButton.react"),{onClick:a.onTimelineClicked,role:"button"},b("React").createElement("ol",{className:"_159h"},b("React").createElement("li",{key:"timelineList",className:"_1sex"+(a.timelineSelected?" _1sfg":"")},b("React").createElement("div",{className:"_1sez",key:"timelineListItem"},b("React").createElement("div",{className:"_1se-"},b("React").createElement("div",{className:"_1se_"})),b("React").createElement("div",{className:"_3-w4 _3-w6"}),b("React").createElement("div",{className:"_3-we",onKeyPress:function(a){return a.stopPropagation()}},b("React").createElement(b("XUIText.react"),{className:"_3qpq _3qps",size:"header3"},a.destinationName||b("SharingSpacesStrings").SHARING_SPACES_SELECTOR_DESTINATION_TIMELINE),b("React").createElement(b("ReactComposerAudienceSelectorContainer.react"),{audienceXHP:a.audienceXHP,className:"_3-wg",ignoreCollectionAudience:!0,viewerIsTarget:a.viewerIsTarget})))))))}e.exports=a}),null);
__d("ReactComposerSharingSpacesSelector.react",["cx","ReactComposerAudienceActions","ComposerSharingSpacesEvent","ReactComposerSharingSpacesSelectorStoriesContainerGatedModule","ReactComposerSharingSpacesSelectorTimelineSection.react","ComposerDestinationsLoggingUtils","React","ReactComposerContextTypes","ReactComposerSharingSpacesSelectorMessengerSectionGatedModule","SearchableEntry","SharesheetDestination","SharingSpacesStrings","immutable","MessengerGCFParticipantItem.react","MessengerGCFParticipantPicker.react","requireWeak"],(function(a,b,c,d,e,f,g){"use strict";__p&&__p();var h,i=b("ReactComposerSharingSpacesSelectorStoriesContainerGatedModule").module,j=b("ReactComposerSharingSpacesSelectorMessengerSectionGatedModule").module;c=babelHelpers.inherits(a,b("React").Component);h=c&&c.prototype;function a(a){h.constructor.call(this,a),this.NUM_INITIAL_SHOWN=10,this.LIST_PAGE_SIZE=10,this.state={messengerRecipientsloading:!0,messengerRecipientEntries:[]},this.$2=function(){b("ReactComposerAudienceActions").toggleTimelineSelected(this.context.composerID),b("ReactComposerAudienceActions").setCollectionID(this.context.composerID,b("ComposerSharingSpacesEvent").COMPOSER_SELECT_TIMELINE_CHOOSE,null,null),b("ComposerDestinationsLoggingUtils").logComposerDestinationsNewsFeedToggled(this.context.composerID)}.bind(this),this.$3=function(){b("ReactComposerAudienceActions").toggleStoriesSelected(this.context.composerID),b("ReactComposerAudienceActions").setCollectionID(this.context.composerID,b("ComposerSharingSpacesEvent").COMPOSER_SELECT_TIMELINE_CHOOSE,null,null),b("ComposerDestinationsLoggingUtils").logComposerDestinationsMyStoryToggled(this.context.composerID)}.bind(this),this.$4=function(a){a=a.getUniqueID();b("ReactComposerAudienceActions").addOrRemoveMessengerEntry(this.context.composerID,a)}.bind(this),this.$1=new Map()}a.prototype.$5=function(){return b("React").createElement(b("ReactComposerSharingSpacesSelectorTimelineSection.react"),{audienceXHP:this.props.config.audienceXHP,destinationName:i?b("SharingSpacesStrings").SHARING_SPACES_SELECTOR_DESTINATION_NEWS_FEED:b("SharingSpacesStrings").SHARING_SPACES_SELECTOR_DESTINATION_TIMELINE,key:"timelineSection",onTimelineClicked:this.$2,timelineSelected:this.props.timelineSelected,viewerIsTarget:this.props.config.targetData.viewerIsTarget,isTwoStep:this.context.gks&&this.context.gks.twoStepComposer})};a.prototype.$6=function(){return i?b("React").createElement(i,{key:"storiesSection",onStoriesClicked:this.$3,storiesSelected:this.props.storiesSelected,viewerIsTarget:this.props.config.targetData.viewerIsTarget,composerID:this.context.composerID,isTwoStep:this.context.gks&&this.context.gks.twoStepComposer}):null};a.prototype.$7=function(){return j?b("React").createElement(j,{ParticipantRow:b("MessengerGCFParticipantItem.react"),ParticipantList:b("MessengerGCFParticipantPicker.react"),key:"messengerSection",onClickEntry:this.$4,loading:this.state.messengerRecipientsloading,entries:this.state.messengerRecipientEntries,selectedEntries:this.props.selectedMessengerRecipientEntries}):null};a.prototype.componentDidMount=function(){b("ComposerDestinationsLoggingUtils").logComposerDestinationsBottomSheetOpened(this.context.composerID),b("requireWeak")("OrderedFriendsList",function(a){return a.getSearchableEntries(20,!0,function(a){this.setState({messengerRecipientEntries:a.filter(function(a){return!this.$1.has(a.getUniqueID())}.bind(this)),messengerRecipientsloading:!1})}.bind(this))}.bind(this))};a.prototype.render=function(){var a=[];switch(this.props.defaultSelection){case b("SharesheetDestination").STORIES:a=[this.$6(),this.$5(),this.$7()];break;case b("SharesheetDestination").TIMELINE:case b("SharesheetDestination").NONE:default:a=[this.$5(),this.$6(),this.$7()]}return b("React").createElement("div",{className:"uiContextualLayerParent"},b("React").createElement("div",{className:"_26c-"},b("React").createElement("ol",{className:"_26bz"},a),this.props.footer))};a.contextTypes=b("ReactComposerContextTypes");e.exports=a}),null);
__d("ReactComposerFooterWithDestinationPicker.react",["cx","React","ReactComposerPostButtonContainer.react","ReactComposerSharingSpacesSelector.react","ReactComposerContextTypes","XUICardSection.react","immutable"],(function(a,b,c,d,e,f,g){"use strict";__p&&__p();var h;h=babelHelpers.inherits(a,b("React").Component);h&&h.prototype;a.prototype.$1=function(){var a=this.props.postButtonModule||b("ReactComposerPostButtonContainer.react");return b("React").createElement("div",{className:"_45wg"},b("React").createElement(a,{className:"_4r1q",config:this.props.config,forceDisabled:!this.props.storiesSelected&&!this.props.timelineSelected&&this.props.selectedMessengerRecipientEntries.size==0,label:this.props.postButtonLabel}))};a.prototype.render=function(){return!this.props.isComposerFocused?null:b("React").createElement(b("XUICardSection.react"),{className:"_2dck _1pek"},b("React").createElement(b("ReactComposerSharingSpacesSelector.react"),{collections:null,config:this.props.config,defaultSelection:this.context.gks.defaultDestination,selectedCollectionID:null,storiesSelected:this.props.storiesSelected,timelineSelected:this.props.timelineSelected,selectedMessengerRecipientEntries:this.props.selectedMessengerRecipientEntries}),this.$1())};function a(){h.apply(this,arguments)}a.contextTypes=b("ReactComposerContextTypes");e.exports=a}),null);