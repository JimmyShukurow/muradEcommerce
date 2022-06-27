const Ziggy = {"url":"http:\/\/localhost","port":null,"defaults":{},"routes":{"telescope":{"uri":"telescope\/{view?}","methods":["GET","HEAD"],"wheres":{"view":"(.*)"}},"ignition.healthCheck":{"uri":"_ignition\/health-check","methods":["GET","HEAD"]},"ignition.executeSolution":{"uri":"_ignition\/execute-solution","methods":["POST"]},"ignition.updateConfig":{"uri":"_ignition\/update-config","methods":["POST"]},"home":{"uri":"\/","methods":["GET","HEAD"]},"admin":{"uri":"admin","methods":["GET","HEAD"]},"admin.products":{"uri":"products","methods":["GET","HEAD"]},"mobile.login":{"uri":"mobileLogin","methods":["GET","HEAD"]},"product":{"uri":"products\/{product}","methods":["GET","HEAD"],"bindings":{"product":"id"}}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
