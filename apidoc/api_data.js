define({ "api": [
  {
    "type": "GET",
    "url": "/add",
    "title": "物品加入购物车",
    "group": "cart",
    "version": "0.0.1",
    "description": "<p>物品加入购物车</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Token",
            "description": "<p>请求头中的token</p>"
          },
          {
            "group": "Parameter",
            "type": "int",
            "optional": false,
            "field": "goodsId",
            "description": "<p>商品id号</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "请求样例：",
          "content": "cart/add/此参数为商品id号",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "2000": [
          {
            "group": "2000",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>信息</p>"
          },
          {
            "group": "2000",
            "type": "int",
            "optional": false,
            "field": "code",
            "description": "<p>2000 代表无错误  其他代表有错误</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "返回样例:",
          "content": "               {\n\"code\": 2000,\n\"msg\": \"操作成功\",\n\"data\": null\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/controller/Cart.php",
    "groupTitle": "cart",
    "name": "GetAdd"
  },
  {
    "type": "GET",
    "url": "/emptyCart",
    "title": "清空购物车",
    "group": "cart",
    "version": "0.0.1",
    "description": "<p>用户清空购物车</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Token",
            "description": "<p>请求头中的token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "请求样例：",
          "content": "cart/emptyCart",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "2000": [
          {
            "group": "2000",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>信息</p>"
          },
          {
            "group": "2000",
            "type": "int",
            "optional": false,
            "field": "code",
            "description": "<p>2000 代表无错误  其他代表有错误</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "返回样例:",
          "content": "               {\n\"code\": 2000,\n\"msg\": \"操作成功\",\n\"data\": null\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/controller/Cart.php",
    "groupTitle": "cart",
    "name": "GetEmptycart"
  },
  {
    "type": "GET",
    "url": "/goodsList",
    "title": "购物车列表",
    "group": "cart",
    "version": "0.0.1",
    "description": "<p>购物车列表</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Token",
            "description": "<p>请求头中的token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "请求样例：",
          "content": "cart/goodsList",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "2000": [
          {
            "group": "2000",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>信息</p>"
          },
          {
            "group": "2000",
            "type": "int",
            "optional": false,
            "field": "code",
            "description": "<p>2000 代表无错误  其他代表有错误</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "返回样例:",
          "content": "               {\n\"code\": 2000,\n\"msg\": \"操作成功\",\n\"data\": [\n{\n\"goodsId\": \"3\",\n\"total\": 1,\n\"is_invalid\": 1,\n\"goods\": {\n\"goods_id\": 3,\n\"goods_name\": \"啊啊啊啊啊啊\",\n\"goods_num\": 30,\n\"goods_img\": \"[\\\"https://lf.ruixinec.com/timg1.jpg\\\"]\",\n\"goods_cover\": \"https://lf.ruixinec.com/timg1.jpg\",\n\"goods_current_price\": \"100.00\",\n\"goods_original_price\": \"100.00\",\n\"goods_admin_id\": 1,\n\"goods_lease_time\": 30,\n\"goods_create_time\": 123456789,\n\"goods_update_time\": 123456789,\n\"goods_status\": -1,\n\"goods_category_id\": 5,\n\"goods_is_host\": 1\n}\n},\n{\n\"goodsId\": \"2\",\n\"total\": 3,\n\"is_invalid\": 0,\n\"goods\": {\n\"goods_id\": 2,\n\"goods_name\": \"出租出租\",\n\"goods_num\": 20,\n\"goods_img\": \"[\\\"https://lf.ruixinec.com/timg1.jpg\\\"]\",\n\"goods_cover\": \"https://lf.ruixinec.com/timg1.jpg\",\n\"goods_current_price\": \"1020.00\",\n\"goods_original_price\": \"2000.00\",\n\"goods_admin_id\": 1,\n\"goods_lease_time\": 40,\n\"goods_create_time\": 2147483647,\n\"goods_update_time\": 214532145,\n\"goods_status\": 1,\n\"goods_category_id\": 4,\n\"goods_is_host\": 0\n}\n},\n{\n\"goodsId\": \"1\",\n\"total\": 3,\n\"is_invalid\": 0,\n\"goods\": {\n\"goods_id\": 1,\n\"goods_name\": \"商品礼服出租啊啊啊\",\n\"goods_num\": 10,\n\"goods_img\": \"[\\\"https://lf.ruixinec.com/e0c85abcfd72802c06737a1b1ec18a62.png\\\",\\\"https://lf.ruixinec.com/f030e28e68e326cb70861cc58d9b2485.png\\\"]\",\n\"goods_cover\": \"https://lf.ruixinec.com/e0c85abcfd72802c06737a1b1ec18a62.png\",\n\"goods_current_price\": \"100.00\",\n\"goods_original_price\": \"100.00\",\n\"goods_admin_id\": 1,\n\"goods_lease_time\": 32,\n\"goods_create_time\": 1563351565,\n\"goods_update_time\": 1563351565,\n\"goods_status\": 1,\n\"goods_category_id\": 4,\n\"goods_is_host\": 0\n}\n}\n]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/controller/Cart.php",
    "groupTitle": "cart",
    "name": "GetGoodslist"
  },
  {
    "type": "GET",
    "url": "/goodsNum",
    "title": "购物车商品数量",
    "group": "cart",
    "version": "0.0.1",
    "description": "<p>购物车商品数量</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Token",
            "description": "<p>请求头中的token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "请求样例：",
          "content": "cart/goodsNum",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "2000": [
          {
            "group": "2000",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>信息</p>"
          },
          {
            "group": "2000",
            "type": "int",
            "optional": false,
            "field": "code",
            "description": "<p>2000 代表无错误  其他代表有错误</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "返回样例:",
          "content": "               {\n\"code\": 2000,\n\"msg\": \"操作成功\",\n\"data\": {\n\"cartGoodsNum\": 3\n}\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/controller/Cart.php",
    "groupTitle": "cart",
    "name": "GetGoodsnum"
  },
  {
    "type": "GET",
    "url": "/minus",
    "title": "减掉购物车的数量",
    "group": "cart",
    "version": "0.0.1",
    "description": "<p>减掉购物车的数量</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Token",
            "description": "<p>请求头中的token</p>"
          },
          {
            "group": "Parameter",
            "type": "int",
            "optional": false,
            "field": "goodsId",
            "description": "<p>商品id号</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "请求样例：",
          "content": "cart/minus/此参数为商品id号",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "2000": [
          {
            "group": "2000",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>信息</p>"
          },
          {
            "group": "2000",
            "type": "int",
            "optional": false,
            "field": "code",
            "description": "<p>2000 代表无错误  其他代表有错误</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "返回样例:",
          "content": "               {\n\"code\": 2000,\n\"msg\": \"操作成功\",\n\"data\": null\n}\n{\n\"code\": 2001,\n\"msg\": \"商品数量不能再少了！\",\n\"data\": null\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/controller/Cart.php",
    "groupTitle": "cart",
    "name": "GetMinus"
  },
  {
    "type": "POST",
    "url": "/delGoods",
    "title": "批量移除购物车商品",
    "group": "cart",
    "version": "0.0.1",
    "description": "<p>批量移除购物车商品</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Token",
            "description": "<p>请求头的token</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "ids",
            "description": "<p>商品id的数组（注意：转成json字符串传入）</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "请求样例：",
          "content": "cart/delGoods",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "2000": [
          {
            "group": "2000",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>信息</p>"
          },
          {
            "group": "2000",
            "type": "int",
            "optional": false,
            "field": "code",
            "description": "<p>2000 代表无错误  其他代表有错误</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "返回样例:",
          "content": "               {\n\"code\": 2000,\n\"msg\": \"操作成功\",\n\"data\": null\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/controller/Cart.php",
    "groupTitle": "cart",
    "name": "PostDelgoods"
  },
  {
    "type": "GET",
    "url": "/goods",
    "title": "分类下的商品",
    "group": "category",
    "version": "0.0.1",
    "description": "<p>二级分类下的商品，注意分页显示</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "int",
            "optional": false,
            "field": "categoryId",
            "description": "<p>二级分类的id号</p>"
          },
          {
            "group": "Parameter",
            "type": "int",
            "optional": false,
            "field": "page",
            "description": "<p>页号</p>"
          },
          {
            "group": "Parameter",
            "type": "int",
            "optional": false,
            "field": "pageSize",
            "description": "<p>页面大小</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "请求样例：",
          "content": "category/goods/此参数为二级分类的id号/此参数为页号/此参数为页面大小",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "2000": [
          {
            "group": "2000",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>信息</p>"
          },
          {
            "group": "2000",
            "type": "int",
            "optional": false,
            "field": "code",
            "description": "<p>2000 代表无错误  其他代表有错误</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "返回样例:",
          "content": "               {\n\"code\": 2000,\n\"msg\": \"操作成功\",\n\"data\": {\n\"total\": 3,\n\"per_page\": \"2\",\n\"current_page\": 1,\n\"last_page\": 2,\n\"data\": [\n{\n\"goods_id\": 2,\n\"goods_name\": \"出租出租\",\n\"goods_num\": 20,\n\"goods_img\": \"[\\\"https://lf.ruixinec.com/timg1.jpg\\\"]\",\n\"goods_cover\": \"https://lf.ruixinec.com/timg1.jpg\",\n\"goods_current_price\": \"1020.00\",\n\"goods_original_price\": \"2000.00\",\n\"goods_admin_id\": 1,\n\"goods_lease_time\": 40,\n\"goods_create_time\": 2147483647,\n\"goods_update_time\": 214532145,\n\"goods_status\": 1,\n\"goods_category_id\": 4,\n\"goods_is_host\": 0\n},\n{\n\"goods_id\": 1,\n\"goods_name\": \"商品礼服出租啊啊啊\",\n\"goods_num\": 10,\n\"goods_img\": \"[\\\"https://lf.ruixinec.com/e0c85abcfd72802c06737a1b1ec18a62.png\\\",\\\"https://lf.ruixinec.com/f030e28e68e326cb70861cc58d9b2485.png\\\"]\",\n\"goods_cover\": \"https://lf.ruixinec.com/e0c85abcfd72802c06737a1b1ec18a62.png\",\n\"goods_current_price\": \"100.00\",\n\"goods_original_price\": \"100.00\",\n\"goods_admin_id\": 1,\n\"goods_lease_time\": 32,\n\"goods_create_time\": 1563351565,\n\"goods_update_time\": 1563351565,\n\"goods_status\": 1,\n\"goods_category_id\": 4,\n\"goods_is_host\": 0\n}\n]\n}\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/controller/Category.php",
    "groupTitle": "category",
    "name": "GetGoods"
  },
  {
    "type": "GET",
    "url": "/lists",
    "title": "分类页全部二级分类",
    "group": "category",
    "version": "0.0.1",
    "description": "<p>分类页全部二级分类</p>",
    "parameter": {
      "examples": [
        {
          "title": "请求样例：",
          "content": "category/lists",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "2000": [
          {
            "group": "2000",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>信息</p>"
          },
          {
            "group": "2000",
            "type": "int",
            "optional": false,
            "field": "code",
            "description": "<p>2000 代表无错误  其他代表有错误</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "返回样例:",
          "content": "               {\n\"code\": 2000,\n\"msg\": \"操作成功\",\n\"data\": [\n{\n\"category_id\": 4,\n\"category_name\": \"小的男装\",\n\"category_img\": \"\",\n\"category_parent_id\": 1,\n\"category_order_sort\": 0,\n\"category_status\": 1,\n\"category_create_time\": 123456789,\n\"category_update_time\": 123456789\n},\n{\n\"category_id\": 5,\n\"category_name\": \"大的男装\",\n\"category_img\": \"\",\n\"category_parent_id\": 1,\n\"category_order_sort\": 0,\n\"category_status\": 1,\n\"category_create_time\": 123456789,\n\"category_update_time\": 123456789\n}\n]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/controller/Category.php",
    "groupTitle": "category",
    "name": "GetLists"
  },
  {
    "type": "GET",
    "url": "/details",
    "title": "商品详情",
    "group": "goods",
    "version": "0.0.1",
    "description": "<p>用户的商品详情</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "int",
            "optional": false,
            "field": "goodsId",
            "description": "<p>商品id号</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "请求样例：",
          "content": "goods/details/此参数为商品id号",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "2000": [
          {
            "group": "2000",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>信息</p>"
          },
          {
            "group": "2000",
            "type": "int",
            "optional": false,
            "field": "code",
            "description": "<p>2000 代表无错误  其他代表有错误</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "返回样例:",
          "content": "               {\n\"code\": 2000,\n\"msg\": \"操作成功\",\n\"data\": {\n\"goods_id\": 1,\n\"goods_name\": \"商品礼服出租啊啊啊\",\n\"goods_num\": 10,\n\"goods_img\": [\n\"https://lf.ruixinec.com/e0c85abcfd72802c06737a1b1ec18a62.png\",\n\"https://lf.ruixinec.com/f030e28e68e326cb70861cc58d9b2485.png\"\n],\n\"goods_cover\": \"https://lf.ruixinec.com/e0c85abcfd72802c06737a1b1ec18a62.png\",\n\"goods_current_price\": \"100.00\",\n\"goods_original_price\": \"100.00\",\n\"goods_admin_id\": 1,\n\"goods_lease_time\": 32,\n\"goods_create_time\": 1563351565,\n\"goods_update_time\": 1563351565,\n\"goods_status\": 1,\n\"goods_category_id\": 4,\n\"goods_is_host\": 0\n}\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/controller/Goods.php",
    "groupTitle": "goods",
    "name": "GetDetails"
  },
  {
    "type": "GET",
    "url": "/bannerDetails",
    "title": "轮播图详情",
    "group": "home",
    "version": "0.0.1",
    "description": "<p>轮播图详情</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "int",
            "optional": false,
            "field": "bannerId",
            "description": "<p>轮播图id号</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "请求样例：",
          "content": "/home/bannerDetails/此参数为轮播图的id号",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "2000": [
          {
            "group": "2000",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>信息</p>"
          },
          {
            "group": "2000",
            "type": "int",
            "optional": false,
            "field": "code",
            "description": "<p>2000 代表无错误  其他代表有错误</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "返回样例:",
          "content": "               {\n\"code\": 2000,\n\"msg\": \"操作成功\",\n\"data\": {\n\"banner_id\": 1,\n\"banner_name\": \"轮播1\",\n\"banner_cover\": \"https://lf.ruixinec.com/timg2.jpg\",\n\"banner_url\": null,\n\"banner_order_sort\": 1,\n\"banner_describe\": \"我是轮播描述1\",\n\"banner_status\": 1,\n\"banner_create_time\": 1234567897,\n\"banner_update_time\": 1234567897\n}\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/controller/Home.php",
    "groupTitle": "home",
    "name": "GetBannerdetails"
  },
  {
    "type": "GET",
    "url": "/banners",
    "title": "首页轮播图",
    "group": "home",
    "version": "0.0.1",
    "description": "<p>首页轮播图展示</p>",
    "parameter": {
      "examples": [
        {
          "title": "请求样例：",
          "content": "/home/banners",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "2000": [
          {
            "group": "2000",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>信息</p>"
          },
          {
            "group": "2000",
            "type": "int",
            "optional": false,
            "field": "code",
            "description": "<p>2000 代表无错误  其他代表有错误</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "返回样例:",
          "content": "               {\n\"code\": 2000,\n\"msg\": \"操作成功\",\n\"data\": [\n{\n\"banner_id\": 2,\n\"banner_name\": \"轮播2\",\n\"banner_cover\": \"https://xiaofuwu.mayiershou.cn/Fv9ync3gSrQAcmY5LlnFsB5Io_AU\",\n\"banner_url\": null,\n\"banner_order_sort\": 2,\n\"banner_describe\": \"我是轮播描述2\",\n\"banner_status\": 1,\n\"banner_create_time\": 1234567897,\n\"banner_update_time\": 1234567897\n},\n{\n\"banner_id\": 1,\n\"banner_name\": \"轮播1\",\n\"banner_cover\": \"https://xiaofuwu.mayiershou.cn/Fv9ync3gSrQAcmY5LlnFsB5Io_AU\",\n\"banner_url\": null,\n\"banner_order_sort\": 1,\n\"banner_describe\": \"我是轮播描述1\",\n\"banner_status\": 1,\n\"banner_create_time\": 1234567897,\n\"banner_update_time\": 1234567897\n}\n]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/controller/Home.php",
    "groupTitle": "home",
    "name": "GetBanners"
  },
  {
    "type": "GET",
    "url": "/categoryGoods",
    "title": "首页分类下商品",
    "group": "home",
    "version": "0.0.1",
    "description": "<p>首页一级分类下的商品展示</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "int",
            "optional": false,
            "field": "categoryLev1Id",
            "description": "<p>一级分类id号</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "请求样例：",
          "content": "home/categoryGoods/此参数是一级分类的id号(注意：全部分类传递的值为 0)",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "2000": [
          {
            "group": "2000",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>信息</p>"
          },
          {
            "group": "2000",
            "type": "int",
            "optional": false,
            "field": "code",
            "description": "<p>2000 代表无错误  其他代表有错误</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "返回样例:",
          "content": "               {\n\"code\": 2000,\n\"msg\": \"操作成功\",\n\"data\": [\n{\n\"goods_id\": 1,\n\"goods_name\": \"商品礼服出租\",\n\"goods_num\": 10,\n\"goods_img\": \"https://www.xxx.com/img.png\",\n\"goods_cover\": \"https://www.xxx.com/img.png\",\n\"goods_current_price\": \"100.00\",\n\"goods_original_price\": \"100.00\",\n\"goods_admin_id\": 1,\n\"goods_lease_time\": 123456789,\n\"goods_create_time\": 254365789,\n\"goods_update_time\": 254365789,\n\"goods_status\": 1,\n\"goods_category_id\": 4,\n\"goods_is_host\": 0\n},\n{\n\"goods_id\": 3,\n\"goods_name\": \"啊啊啊啊啊啊\",\n\"goods_num\": 30,\n\"goods_img\": null,\n\"goods_cover\": null,\n\"goods_current_price\": \"100.00\",\n\"goods_original_price\": \"100.00\",\n\"goods_admin_id\": 1,\n\"goods_lease_time\": 123456789,\n\"goods_create_time\": 123456789,\n\"goods_update_time\": 123456789,\n\"goods_status\": 1,\n\"goods_category_id\": 5,\n\"goods_is_host\": 0\n},\n{\n\"goods_id\": 4,\n\"goods_name\": \"哦哦哦哦\",\n\"goods_num\": 87,\n\"goods_img\": \"\",\n\"goods_cover\": null,\n\"goods_current_price\": \"360.00\",\n\"goods_original_price\": \"360.00\",\n\"goods_admin_id\": 1,\n\"goods_lease_time\": 123456789,\n\"goods_create_time\": 123456789,\n\"goods_update_time\": 123456789,\n\"goods_status\": 1,\n\"goods_category_id\": 6,\n\"goods_is_host\": 0\n}\n]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/controller/Home.php",
    "groupTitle": "home",
    "name": "GetCategorygoods"
  },
  {
    "type": "GET",
    "url": "/categoryLev1",
    "title": "商品一级分类",
    "group": "home",
    "version": "0.0.1",
    "description": "<p>首页商品一级分类（全部 默认写死 id=0）</p>",
    "parameter": {
      "examples": [
        {
          "title": "请求样例：",
          "content": "/home/categoryLev1",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "2000": [
          {
            "group": "2000",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>信息</p>"
          },
          {
            "group": "2000",
            "type": "int",
            "optional": false,
            "field": "code",
            "description": "<p>2000 代表无错误  其他代表有错误</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "返回样例:",
          "content": "               {\n\"code\": 2000,\n\"msg\": \"操作成功\",\n\"data\": [\n{\n\"category_id\": 1,\n\"category_name\": \"男装\",\n\"category_img\": \"\",\n\"category_parent_id\": 0,\n\"category_order_sort\": 0,\n\"category_status\": 1,\n\"category_create_time\": 123456789,\n\"category_update_time\": 123456789\n},\n{\n\"category_id\": 2,\n\"category_name\": \"女装\",\n\"category_img\": \"\",\n\"category_parent_id\": 0,\n\"category_order_sort\": 0,\n\"category_status\": 1,\n\"category_create_time\": 123456789,\n\"category_update_time\": 123456789\n},\n{\n\"category_id\": 3,\n\"category_name\": \"道具\",\n\"category_img\": \"\",\n\"category_parent_id\": 0,\n\"category_order_sort\": 0,\n\"category_status\": 1,\n\"category_create_time\": 123456789,\n\"category_update_time\": 123456789\n}\n]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/controller/Home.php",
    "groupTitle": "home",
    "name": "GetCategorylev1"
  },
  {
    "type": "GET",
    "url": "/hostGoods",
    "title": "首页热门服装",
    "group": "home",
    "version": "0.0.1",
    "description": "<p>首页热门服装</p>",
    "parameter": {
      "examples": [
        {
          "title": "请求样例：",
          "content": "home/hostGoods",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "2000": [
          {
            "group": "2000",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>信息</p>"
          },
          {
            "group": "2000",
            "type": "int",
            "optional": false,
            "field": "code",
            "description": "<p>2000 代表无错误  其他代表有错误</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "返回样例:",
          "content": "               {\n\"code\": 2000,\n\"msg\": \"操作成功\",\n\"data\": [\n{\n\"goods_id\": 3,\n\"goods_name\": \"啊啊啊啊啊啊\",\n\"goods_num\": 30,\n\"goods_img\": null,\n\"goods_cover\": null,\n\"goods_current_price\": \"100.00\",\n\"goods_original_price\": \"100.00\",\n\"goods_admin_id\": 1,\n\"goods_lease_time\": 123456789,\n\"goods_create_time\": 123456789,\n\"goods_update_time\": 123456789,\n\"goods_status\": 1,\n\"goods_category_id\": 5,\n\"goods_is_host\": 1\n},\n{\n\"goods_id\": 4,\n\"goods_name\": \"哦哦哦哦\",\n\"goods_num\": 87,\n\"goods_img\": \"\",\n\"goods_cover\": null,\n\"goods_current_price\": \"360.00\",\n\"goods_original_price\": \"360.00\",\n\"goods_admin_id\": 1,\n\"goods_lease_time\": 123456789,\n\"goods_create_time\": 123456789,\n\"goods_update_time\": 123456789,\n\"goods_status\": 1,\n\"goods_category_id\": 6,\n\"goods_is_host\": 1\n}\n]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/controller/Home.php",
    "groupTitle": "home",
    "name": "GetHostgoods"
  },
  {
    "type": "GET",
    "url": "/hostGoodsMore",
    "title": "首页热门更多",
    "group": "home",
    "version": "0.0.1",
    "description": "<p>首页热门更多</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "int",
            "optional": false,
            "field": "page",
            "description": "<p>页号</p>"
          },
          {
            "group": "Parameter",
            "type": "int",
            "optional": false,
            "field": "pageSize",
            "description": "<p>页面大小</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "请求样例：",
          "content": "home/hostGoodsMore/此参数为页号/此参数为页面显示数",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "2000": [
          {
            "group": "2000",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>信息</p>"
          },
          {
            "group": "2000",
            "type": "int",
            "optional": false,
            "field": "code",
            "description": "<p>2000 代表无错误  其他代表有错误</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "返回样例:",
          "content": "               {\n\"code\": 2000,\n\"msg\": \"操作成功\",\n\"data\": {\n\"total\": 2,\n\"per_page\": \"2\",\n\"current_page\": 1,\n\"last_page\": 1,\n\"data\": [\n{\n\"goods_id\": 3,\n\"goods_name\": \"啊啊啊啊啊啊\",\n\"goods_num\": 30,\n\"goods_img\": null,\n\"goods_cover\": null,\n\"goods_current_price\": \"100.00\",\n\"goods_original_price\": \"100.00\",\n\"goods_admin_id\": 1,\n\"goods_lease_time\": 123456789,\n\"goods_create_time\": 123456789,\n\"goods_update_time\": 123456789,\n\"goods_status\": 1,\n\"goods_category_id\": 5,\n\"goods_is_host\": 1\n},\n{\n\"goods_id\": 4,\n\"goods_name\": \"哦哦哦哦\",\n\"goods_num\": 87,\n\"goods_img\": \"\",\n\"goods_cover\": null,\n\"goods_current_price\": \"360.00\",\n\"goods_original_price\": \"360.00\",\n\"goods_admin_id\": 1,\n\"goods_lease_time\": 123456789,\n\"goods_create_time\": 123456789,\n\"goods_update_time\": 123456789,\n\"goods_status\": 1,\n\"goods_category_id\": 6,\n\"goods_is_host\": 1\n}\n]\n}\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/controller/Home.php",
    "groupTitle": "home",
    "name": "GetHostgoodsmore"
  },
  {
    "type": "GET",
    "url": "/aboutMy",
    "title": "关于我们和联系方式",
    "group": "user",
    "version": "0.0.1",
    "description": "<p>个人中心关于我们和联系方式</p>",
    "parameter": {
      "examples": [
        {
          "title": "请求样例：",
          "content": "user/aboutMy",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "2000": [
          {
            "group": "2000",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>信息</p>"
          },
          {
            "group": "2000",
            "type": "int",
            "optional": false,
            "field": "code",
            "description": "<p>2000 代表无错误  其他代表有错误</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "返回样例:",
          "content": "               {\n\"code\": 2000,\n\"msg\": \"操作成功\",\n\"data\": {\n\"merchant_id\": 1,\n\"merchant_name\": \"正青春歌舞团\",\n\"merchant_phone\": \"85784512\",\n\"merchant_mobile\": \"13604011234\",\n\"merchant_address\": \"辽宁省吉林市\",\n\"merchant_lng\": null,\n\"merchant_lat\": null,\n\"merchant_description\": \"<p>公司简介简介</p><p>阿萨达阿萨啊啊敖德萨所阿萨撒撒啊</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;阿萨德阿萨撒撒发顺丰a<br/></p><p><img src=\\\"https://lf.ruixinec.com/f8137c4ea2e3a8e6850ca1d581ff28f8.png\\\" title=\\\"\\\" alt=\\\"\\\"/></p>\"\n}\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/controller/User.php",
    "groupTitle": "user",
    "name": "GetAboutmy"
  },
  {
    "type": "GET",
    "url": "/info",
    "title": "用户基本信息",
    "group": "user",
    "version": "0.0.1",
    "description": "<p>用户基本信息</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "Token",
            "description": "<p>请求头中的token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "请求样例：",
          "content": "user/info",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "2000": [
          {
            "group": "2000",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>信息</p>"
          },
          {
            "group": "2000",
            "type": "int",
            "optional": false,
            "field": "code",
            "description": "<p>2000 代表无错误  其他代表有错误</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "返回样例:",
          "content": "               {\n\"code\": 2000,\n\"message\": \"成功\",\n\"data\": {\n\"session_key\": \"SdI/9k9sVQbHcFeegQmlHA==\",\n\"openid\": \"oihuL5UJ9IFoEpwkooTBtBNXlFLM\"\n}\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/controller/User.php",
    "groupTitle": "user",
    "name": "GetInfo"
  },
  {
    "type": "GET",
    "url": "/weChatAuth",
    "title": "授权获取",
    "group": "user",
    "version": "0.0.1",
    "description": "<p>用户授权获取openid，session_key</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "jsCode",
            "description": "<p>前端jsCode</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "请求样例：",
          "content": "user/weChatAuth/001pzHMI06m1jg2VfCNI0f1vMI0pzHMS",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "2000": [
          {
            "group": "2000",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>信息</p>"
          },
          {
            "group": "2000",
            "type": "int",
            "optional": false,
            "field": "code",
            "description": "<p>2000 代表无错误  其他代表有错误</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "返回样例:",
          "content": "               {\n\"code\": 2000,\n\"message\": \"成功\",\n\"data\": {\n\"session_key\": \"SdI/9k9sVQbHcFeegQmlHA==\",\n\"openid\": \"oihuL5UJ9IFoEpwkooTBtBNXlFLM\"\n}\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/controller/User.php",
    "groupTitle": "user",
    "name": "GetWechatauth"
  },
  {
    "type": "POST",
    "url": "/login",
    "title": "授权登录",
    "group": "user",
    "version": "0.0.1",
    "description": "<p>用于登录用户</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "iv",
            "description": "<p>解密盐值</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "encryptedData",
            "description": "<p>解密盐值</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "sessionKey",
            "description": "<p>Session_key值</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "请求样例：",
          "content": "?iv=xx&encryptedData=xx&sessionKey=xx",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "2000": [
          {
            "group": "2000",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>信息</p>"
          },
          {
            "group": "2000",
            "type": "int",
            "optional": false,
            "field": "code",
            "description": "<p>2000 代表无错误  其他代表有错误</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "返回样例:",
          "content": "     {\"code\":\"2000\",\"message\":\"成功\",\"data\":{\n         \"token\" : \"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VySWQiOjN9.SIaSUoeGsW-stlbLvi6CQOIfce8Z-Opvt7H_pqzaGYM\"\n     }\n}",
          "type": "json"
        }
      ]
    },
    "filename": "application/api/controller/User.php",
    "groupTitle": "user",
    "name": "PostLogin"
  }
] });
