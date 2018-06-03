if (self.CavalryLogger) { CavalryLogger.start_js(["VgkP1"]); }

__d("FantaMercuryTabOverflowTitle.react",["CurrentUser","MercuryThreads","MercuryThreadTitle.react","React","SubscriptionsHandler"],(function(a,b,c,d,e,f){"use strict";__p&&__p();var g;c=b("React").PropTypes;d=babelHelpers.inherits(a,b("React").Component);g=d&&d.prototype;function a(a){g.constructor.call(this,a),this.$1=new(b("SubscriptionsHandler"))(),this.state={thread:null}}a.prototype.componentDidMount=function(){b("MercuryThreads").get().getThreadMeta(this.props.threadID,function(a){return this.setState({thread:a})}.bind(this)),this.$1.addSubscriptions(b("MercuryThreads").addListener("change",function(){this.setState({thread:b("MercuryThreads").get().getThreadMetaNow(this.props.threadID)})}.bind(this)))};a.prototype.componentWillUnmount=function(){this.$1.release()};a.prototype.render=function(){var a=this.props.threadID,c=this.state.thread;return!c?null:b("React").createElement(b("MercuryThreadTitle.react"),{isNewThread:b("MercuryThreads").get().isNewEmptyLocalThread(a),showUnreadCount:!0,thread:c,useAndSeparator:!0,useShortName:!c.is_canonical,viewer:b("CurrentUser").getID()})};a.propTypes={threadID:c.string.isRequired};e.exports=a}),null);
__d("FantaMercuryTabOverflow.react",["ix","cx","fbt","ContextualLayerAutoFlip","FantaMercuryTabOverflowTitle.react","FantaTabActions","Image.react","PopoverMenu.react","PopoverMenuOverlappingBorder","React","ReactMenu","XUIBadge.react","XUICloseButton.react","fbglyph"],(function(a,b,c,d,e,f,g,h,i){"use strict";__p&&__p();var j,k=b("ReactMenu").SelectableMenu,l=b("ReactMenu").SelectableItem;j=babelHelpers.inherits(a,b("React").Component);j&&j.prototype;a.prototype.render=function(){var a=this.props.items;a=b("React").createElement(k,null,a.map(function(a){return b("React").createElement(l,{className:"_372-",key:a.id,onclick:function(){return b("FantaTabActions").focusTab(a.id)}},b("React").createElement(b("FantaMercuryTabOverflowTitle.react"),{threadID:a.id}),b("React").createElement(b("XUICloseButton.react"),{className:"_372_ dark",onClick:function(){return b("FantaTabActions").closeTab(a.id)},size:"small"}),b("React").createElement(b("XUICloseButton.react"),{className:"_372_ light",onClick:function(){return b("FantaTabActions").closeTab(a.id)},shade:"light",size:"small"}))}).toArray());return b("React").createElement(b("PopoverMenu.react"),{alignh:"right",alignv:"top",behaviors:[b("PopoverMenuOverlappingBorder")],className:"fbNub _50-v _3731",layerBehaviors:[b("ContextualLayerAutoFlip")],menu:a},b("React").createElement("a",{href:"#",role:"button",className:"fbNubButton"},b("React").createElement("span",{className:"_3732"},b("React").createElement(b("Image.react"),{alt:i._("messages"),className:"messagesIcon",src:g("124850")}),b("React").createElement(b("XUIBadge.react"),{className:"unreadCount",count:0,"data-jsid":"numMessages",type:"special"}))))};function a(){j.apply(this,arguments)}e.exports=a}),null);