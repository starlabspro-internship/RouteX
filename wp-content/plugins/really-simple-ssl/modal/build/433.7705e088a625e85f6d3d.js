(globalThis.webpackChunkreally_simple_ssl_modal=globalThis.webpackChunkreally_simple_ssl_modal||[]).push([[433],{433:(e,t,r)=>{"use strict";r.r(t),r.d(t,{default:()=>p});var l=r(609),n=r(427),s=r(87),a=r(723),o=r(378),m=r.n(o);class c extends s.Component{constructor(e){super(e),this.state={hasError:!1,error:null,errorInfo:null},this.resetError=this.resetError.bind(this)}static getDerivedStateFromError(e){return{hasError:!0}}componentDidCatch(e,t){this.setState({error:e,errorInfo:t}),console.log("ErrorBoundary",e,t)}resetError(){this.setState({hasError:!1,error:null,errorInfo:null})}render(){return this.state.hasError?(0,l.createElement)("div",null,(0,l.createElement)("h1",null,"Something went wrong."),(0,l.createElement)("p",null,this.props.fallback),(0,l.createElement)("button",{onClick:this.resetError},"Try Again")):this.props.children}}c.propTypes={children:m().node,fallback:m().node};const i=c,p=({title:e,subTitle:t,currentStep:o,buttons:m,content:c,list:p,confirmAction:u,confirmText:d,alternativeAction:E,alternativeText:h,alternativeClassName:f,isOpen:g,setOpen:y,className:w})=>{const[_,b]=(0,s.useState)(null);let C="undefined"!=typeof rsssl_modal?rsssl_modal.plugin_url:rsssl_settings.plugin_url;f=f||"rsssl-warning",(0,s.useEffect)((()=>{_||Promise.all([r.e(161),r.e(291)]).then(r.bind(r,291)).then((({default:e})=>{b((()=>e))}))}));let T=w?" "+w:"";return wp.element.createElement(l.Fragment,null,g&&wp.element.createElement(l.Fragment,null,wp.element.createElement(i,{fallback:"Error loading modal"},wp.element.createElement(n.Modal,{className:"rsssl-modal"+T,shouldCloseOnClickOutside:!1,shouldCloseOnEsc:!1,title:e,onRequestClose:()=>y(!1),open:g},wp.element.createElement("div",{className:"rsssl-modal-body"},t&&wp.element.createElement("p",{dangerouslySetInnerHTML:{__html:t}}),c&&wp.element.createElement(l.Fragment,null,c),p&&_&&wp.element.createElement("ul",null,p.map(((e,t)=>wp.element.createElement("li",{key:t},wp.element.createElement(_,{name:e.icon,color:e.color}),e.text))))),wp.element.createElement("div",{className:"rsssl-modal-footer"},wp.element.createElement("div",{className:"rsssl-modal-footer-image"},wp.element.createElement("img",{className:"rsssl-logo",src:C+"assets/img/really-simple-security-logo.svg",alt:"Really Simple Security"})),wp.element.createElement("div",{className:"rsssl-modal-footer-buttons"},wp.element.createElement(n.Button,{onClick:()=>y(!1)},(0,a.__)("Cancel","really-simple-ssl")),m&&wp.element.createElement(l.Fragment,null,m),!m&&wp.element.createElement(l.Fragment,null,h&&wp.element.createElement(n.Button,{className:f,onClick:()=>E()},h),d&&wp.element.createElement(n.Button,{isPrimary:!0,onClick:()=>u()},d))))))))}},572:(e,t,r)=>{"use strict";var l=r(808);function n(){}function s(){}s.resetWarningCache=n,e.exports=function(){function e(e,t,r,n,s,a){if(a!==l){var o=new Error("Calling PropTypes validators directly is not supported by the `prop-types` package. Use PropTypes.checkPropTypes() to call them. Read more at http://fb.me/use-check-prop-types");throw o.name="Invariant Violation",o}}function t(){return e}e.isRequired=e;var r={array:e,bigint:e,bool:e,func:e,number:e,object:e,string:e,symbol:e,any:e,arrayOf:t,element:e,elementType:e,instanceOf:t,node:e,objectOf:t,oneOf:t,oneOfType:t,shape:t,exact:t,checkPropTypes:s,resetWarningCache:n};return r.PropTypes=r,r}},378:(e,t,r)=>{e.exports=r(572)()},808:e=>{"use strict";e.exports="SECRET_DO_NOT_PASS_THIS_OR_YOU_WILL_BE_FIRED"}}]);