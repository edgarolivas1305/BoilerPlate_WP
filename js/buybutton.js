var scriptURL = 'https://sdks.shopifycdn.com/buy-button/latest/buy-button-storefront.min.js';

function initShopify(p_id) {
    if (window.ShopifyBuy) {
        if (window.ShopifyBuy.UI) {
            ShopifyBuyInit(p_id);
        } else {
            loadScript();
        }
    } else {
        loadScript();
    }
}

function loadScript() {
    var script = document.createElement('script');
    script.async = true;
    script.src = scriptURL;
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(script);
    script.onload = ShopifyBuyInit;
}

function ShopifyBuyInit(PID) {
    var client = ShopifyBuy.buildClient({
        domain: 'ztek-computers.myshopify.com',
        apiKey: '35868275beafe1035c864d9756348dec',
        appId: '6',
    });

    ShopifyBuy.UI.onReady(client).then(function (ui) {
        ui.createComponent('product', {
            id: [PID],
            node: document.getElementById('BUY-BUTTON'),
            moneyFormat: '%24%20%7B%7Bamount%7D%7D',
            options: {
                "product": {
                    "variantId": "all",
                    "width": "240px",
                    "contents": {
                        "img": false,
                        "imgWithCarousel": false,
                        "title": false,
                        "variantTitle": false,
                        "price": false,
                        "description": false,
                        "buttonWithQuantity": true,
                        "button": false,
                        "quantity": false
                    },
                    "styles": {
                        "product": {
                            "text-align": "left",
                            "@media (min-width: 601px)": {
                                "max-width": "100%",
                                "margin-left": "0",
                                "margin-bottom": "50px"
                            }
                        },
                        "button": {
                            "background-color": "#f6a0ff",
                            "color": "#3b003b",
                            ":hover": {
                                "background-color": "#dd90e6",
                                "color": "#3b003b"
                            },
                            ":focus": {
                                "background-color": "#dd90e6"
                            }
                        },
                        "title": {
                            "font-size": "26px"
                        },
                        "price": {
                            "font-size": "18px"
                        },
                        "compareAt": {
                            "font-size": "15px"
                        }
                    }
                },
                "cart": {
                    "contents": {
                        "button": true
                    },
                    "styles": {
                        "button": {
                            "background-color": "#f6a0ff",
                            "color": "#3b003b",
                            ":hover": {
                                "background-color": "#dd90e6",
                                "color": "#3b003b"
                            },
                            ":focus": {
                                "background-color": "#dd90e6"
                            }
                        },
                        "footer": {
                            "background-color": "#ffffff"
                        }
                    }
                },
                "modalProduct": {
                    "contents": {
                        "img": false,
                        "imgWithCarousel": true,
                        "variantTitle": false,
                        "buttonWithQuantity": true,
                        "button": false,
                        "quantity": false
                    },
                    "styles": {
                        "product": {
                            "@media (min-width: 601px)": {
                                "max-width": "100%",
                                "margin-left": "0px",
                                "margin-bottom": "0px"
                            }
                        },
                        "button": {
                            "background-color": "#f6a0ff",
                            "color": "#3b003b",
                            ":hover": {
                                "background-color": "#dd90e6",
                                "color": "#3b003b"
                            },
                            ":focus": {
                                "background-color": "#dd90e6"
                            }
                        }
                    }
                },
                "toggle": {
                    "styles": {
                        "toggle": {
                            "background-color": "#f6a0ff",
                            ":hover": {
                                "background-color": "#dd90e6"
                            },
                            ":focus": {
                                "background-color": "#dd90e6"
                            }
                        },
                        "count": {
                            "color": "#3b003b",
                            ":hover": {
                                "color": "#3b003b"
                            }
                        },
                        "iconPath": {
                            "fill": "#3b003b"
                        }
                    }
                },
                "productSet": {
                    "styles": {
                        "products": {
                            "@media (min-width: 601px)": {
                                "margin-left": "-20px"
                            }
                        }
                    }
                }
            }
        });
    });
}
