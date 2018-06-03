if (self.CavalryLogger) { CavalryLogger.start_js(["TlsYC"]); }

__d("StarsInput.react",["cx","fbt","invariant","React","TooltipLink.react","joinClasses"],(function(a,b,c,d,e,f,g,h,i){"use strict";__p&&__p();var j,k=Object.freeze({CUMULATIVE:"CUMULATIVE",SINGLE:"SINGLE"}),l=Object.freeze({STAR:"STAR",BOX:"BOX"});c=babelHelpers.inherits(a,b("React").Component);j=c&&c.prototype;function a(a){j.constructor.call(this,a),a.initialStars&&(Number.isInteger(a.initialStars)||i(0)),this.state={starRating:a.initialStars!=undefined?a.initialStars:a.count,starsShown:a.initialStars!=undefined?a.initialStars:a.count,canUpdate:!0}}a.prototype.onMouseEnter=function(a){this.state.canUpdate&&(this.setState({starsShown:a}),this.props.onMouseEnter&&this.props.onMouseEnter(a))};a.prototype.onMouseLeave=function(a){if(this.state.canUpdate){var b=this.state.starRating;this.setState({starsShown:b});this.props.onMouseLeave&&this.props.onMouseLeave(a)}};a.prototype.onClick=function(a){if(this.state.canUpdate){a=this.props.canClear&&a===this.state.starRating?0:a;this.setState({starRating:a,starsShown:a,canUpdate:this.props.allowMultipleSubmissions});this.props.onClick(a)}};a.prototype.$1=function(a,b,c){if(this.props.displayMode==k.SINGLE)return c?a+1==b:!0;else return c?a<b:a>=b};a.prototype.$2=function(a,c){var d="mls _22mm"+(this.state.canUpdate?"":" _1g87");if(this.props.shape==l.BOX){var e="_5fx1"+(this.$1(a,c,!1)?" _5fx2":"")+(this.$1(a,c,!0)?" _5fx3":"");return b("joinClasses")(d,e)}else{e=(this.props.large?"_1vr2":"")+(this.$1(a,c,!1)?" _22mn":"")+(this.$1(a,c,!0)?" _22mo":"");return b("joinClasses")(d,e)}};a.prototype.getStars=function(){__p&&__p();var a=this;if(!this.props.starLabels)return[];var c=this.props.starLabels.length,d=[],e=this.state.starsShown?this.state.starsShown:0,f=function(c){var f=c+1;d.push(b("React").createElement(b("TooltipLink.react"),{className:a.$2(c,e),key:c,tooltip:a.props.starLabels&&a.props.starLabels[c],onMouseEnter:function(a){return this.onMouseEnter(f)}.bind(a),onMouseLeave:function(a){return this.onMouseLeave(f)}.bind(a),onClick:function(a){return this.onClick(f)}.bind(a),position:"above",alignH:"center"}))};for(var g=0;g<c;g++)f(g);return d};a.prototype.render=function(){return b("React").createElement("div",{className:this.props.className},this.getStars())};a.defaultProps={allowMultipleSubmissions:!1,canClear:!1,count:0,large:!1,starLabels:[h._("Poor"),h._("Fair"),h._("Good"),h._("Very Good"),h._("Excellent")],displayMode:k.CUMULATIVE,shape:l.STAR,className:undefined,initialStars:undefined,onMouseEnter:undefined,onMouseLeave:undefined};e.exports=a}),null);
__d("CanvasAppRating.react",["cx","fbt","React","StarsInput.react","shallowCompare"],(function(a,b,c,d,e,f,g,h){__p&&__p();var i;i=babelHelpers.inherits(a,b("React").Component);i&&i.prototype;a.prototype.shouldComponentUpdate=function(a,c){"use strict";return b("shallowCompare")(this,a,c)};a.prototype.render=function(){"use strict";return b("React").createElement("div",{className:this.props.className},b("React").createElement("div",{className:"_2k1 _3-94"},h._("How would you rate this game?")),b("React").createElement(b("StarsInput.react"),{className:"_3w9p",large:!0,onClick:this.props.onStarClick}))};function a(){"use strict";i.apply(this,arguments)}e.exports=a}),null);
__d("CanvasPrompt.react",["cx","Image.react","Layout.react","React","XUICloseButton.react","joinClasses","shallowCompare"],(function(a,b,c,d,e,f,g){__p&&__p();var h,i=b("Layout.react").Column;h=babelHelpers.inherits(a,b("React").Component);h&&h.prototype;a.prototype.shouldComponentUpdate=function(a,c){"use strict";return b("shallowCompare")(this,a,c)};a.prototype.render=function(){"use strict";return b("React").createElement(b("Layout.react"),{className:b("joinClasses")(this.props.className,"_3mqg")},b("React").createElement(i,null,b("React").createElement(b("Image.react"),{height:80,src:this.props.appLogoURL,width:80})),b("React").createElement(i,{className:"_3-9b"},b("React").createElement("div",{className:"_3mqh _3-94"},this.props.header),this.props.body),b("React").createElement(i,{className:"_3-9b"},b("React").createElement(b("XUICloseButton.react"),{onClick:this.props.onCloseClick,size:"medium"})))};function a(){"use strict";h.apply(this,arguments)}e.exports=a}),null);
__d("CanvasAppRatingRecommendationPrompt.react",["cx","fbt","invariant","AppInstallLogger","AppInstallLoggerEvents","AsyncRequest","CanvasAppRating.react","CanvasPrompt.react","React","XUIButton.react","joinClasses","shallowCompare"],(function(a,b,c,d,e,f,g,h,i){__p&&__p();var j;c=babelHelpers.inherits(a,b("React").Component);j=c&&c.prototype;function a(a){"use strict";j.constructor.call(this,a),this.state={isHidden:!1}}a.prototype.shouldComponentUpdate=function(a,c){"use strict";return b("shallowCompare")(this,a,c)};a.prototype.$1=function(){"use strict";this.setState({isHidden:!0}),b("AppInstallLogger").log(b("AppInstallLoggerEvents").GAMES_RATING_PROMPT_CLOSE,this.props.app.id)};a.prototype.$2=function(a){"use strict";this.setState({isHidden:!0});var c=this.props.app.id,d={app_id:c,star_rating:a};new(b("AsyncRequest"))("/games/async/app_rating").setMethod("POST").setData(d).send();b("AppInstallLogger").log(b("AppInstallLoggerEvents").GAMES_RATING_PROMPT_RATE,c,{star_rating:a})};a.prototype.$3=function(a){"use strict";this.setState({isHidden:!0});a=a.map(function(a){return a.getUniqueID()});a={app_id:this.props.app.id,friend_ids:a};new(b("AsyncRequest"))("/games/async/friend_recommend/").setMethod("POST").setData(a).send()};a.prototype.render=function(){"use strict";var a=this.props.app,c=h._("Enjoying {game name}?",[h._param("game name",a.name)]),d=b("React").createElement(b("CanvasAppRating.react"),{onStarClick:function(a){return this.$2(a)}.bind(this)});return b("React").createElement(b("CanvasPrompt.react"),{appLogoURL:a.logoURL,body:d,className:b("joinClasses")(this.props.className,this.state.isHidden?"_2awp":""),header:c,onCloseClick:function(){return this.$1()}.bind(this)})};e.exports=a}),null);