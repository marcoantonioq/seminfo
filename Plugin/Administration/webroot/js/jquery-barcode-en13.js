
(function() {
  (function($, window, document) {
    "use strict";
    var Plugin, defaults, pluginName;
    pluginName = "EAN13";
    defaults = {
      number: true,
      prefix: true,
      color: "#000",
      onValid: function() {},
      onInvalid: function() {},
      onSuccess: function() {},
      onError: function() {}
    };
    Plugin = (function() {
      function Plugin(element, number, options) {
        this.element = element;
        this.number = number;
        this.settings = $.extend({}, defaults, options);
        this._defaults = defaults;
        this._name = pluginName;
        this.init();
      }

      Plugin.prototype.init = function() {
        var code;
        if (this.validate()) {
          this.settings.onValid.call();
        } else {
          this.settings.onInvalid.call();
        }
        code = this.getCode();
        return this.draw(code);
      };

      Plugin.prototype.getCode = function() {
        var c_encoding, code, countries, i, parts, raw_number, x, y, z;
        x = ["0001101", "0011001", "0010011", "0111101", "0100011", "0110001", "0101111", "0111011", "0110111", "0001011"];
        y = ["0100111", "0110011", "0011011", "0100001", "0011101", "0111001", "0000101", "0010001", "0001001", "0010111"];
        z = ["1110010", "1100110", "1101100", "1000010", "1011100", "1001110", "1010000", "1000100", "1001000", "1110100"];
        countries = ["xxxxxx", "xxyxyy", "xxyyxy", "xxyyyx", "xyxxyy", "xyyxxy", "xyyyxx", "xyxyxy", "xyxyyx", "xyyxyx"];
        code = "";
        c_encoding = countries[parseInt(this.number.substr(0, 1), 10)].split("");
        raw_number = this.number.substr(1);
        parts = raw_number.split("");
        i = 0;
        while (i < 6) {
          if (c_encoding[i] === "x") {
            code += x[parts[i]];
          } else {
            code += y[parts[i]];
          }
          i++;
        }
        i = 6;
        while (i < 12) {
          code += z[parts[i]];
          i++;
        }
        return code;
      };

      Plugin.prototype.clear = function(context) {
        return context.clearRect(0, 0, this.element.width, this.element.height);
      };

      Plugin.prototype.draw = function(code) {
        var border_height, chars, context, height, i, item_width, layout, left, lines, offset, prefix, width;
        layout = {
          prefix_offset: 0.06,
          font_stretch: 0.073,
          border_line_height_number: 0.9,
          border_line_height: 1,
          line_height: 0.9,
          font_size: 0.15,
          font_y: 1.03,
          text_offset: 4.5
        };
        width = (this.settings.prefix ? this.element.width * 0.8 : this.element.width);
        if (this.settings.number) {
          border_height = layout.border_line_height_number * this.element.height;
          height = layout.line_height * border_height;
        } else {
          border_height = layout.border_line_height * this.element.height;
          height = layout.line_height * border_height;
        }
        item_width = width / 95;
        if (this.element.getContext) {
          context = this.element.getContext("2d");
          this.clear(context);
          context.fillStyle = this.settings.color;
          left = (this.settings.prefix ? this.element.width * layout.prefix_offset : 0);
          lines = code.split("");
          context.fillRect(left, 0, item_width, border_height);
          left = left + item_width * 2;
          context.fillRect(left, 0, item_width, border_height);
          left = left + item_width;
          i = 0;
          while (i < 42) {
            if (lines[i] === "1") {
              context.fillRect(left, 0, item_width, height);
            }
            left = left + item_width;
            i++;
          }
          left = left + item_width;
          context.fillRect(left, 0, item_width, border_height);
          left = left + item_width * 2;
          context.fillRect(left, 0, item_width, border_height);
          left = left + item_width * 2;
          i = 42;
          while (i < 84) {
            if (lines[i] === "1") {
              context.fillRect(left, 0, item_width, height);
            }
            left = left + item_width;
            i++;
          }
          context.fillRect(left, 0, item_width, border_height);
          left = left + item_width * 2;
          context.fillRect(left, 0, item_width, border_height);
          if (this.settings.number) {
            context.font = layout.font_size * height + "px monospace";
            prefix = this.number.substr(0, 1);
            if (this.settings.prefix) {
              context.fillText(prefix, 0, border_height * layout.font_y);
            }
            offset = item_width * layout.text_offset + (this.settings.prefix ? layout.prefix_offset * this.element.width : 0);
            chars = this.number.substr(1, 6).split("");
            $.each(chars, function(key, value) {
              context.fillText(value, offset, border_height * layout.font_y);
              return offset += layout.font_stretch * width;
            });
            offset = 49 * item_width + (this.settings.prefix ? layout.prefix_offset * this.element.width : 0) + layout.text_offset;
            $.each(this.number.substr(7).split(""), function(key, value) {
              context.fillText(value, offset, border_height * layout.font_y);
              return offset += layout.font_stretch * width;
            });
          }
          return this.settings.onSuccess.call();
        } else {
          return this.settings.onError.call();
        }
      };

      Plugin.prototype.validate = function() {
        var chars, counter, result;
        result = null;
        chars = this.number.split("");
        counter = 0;
        $.each(chars, function(key, value) {
          if (key % 2 === 0) {
            return counter += parseInt(value, 10);
          } else {
            return counter += 3 * parseInt(value, 10);
          }
        });
        if ((counter % 10) === 0) {
          result = true;
        } else {
          result = false;
        }
        return result;
      };

      return Plugin;

    })();
    return $.fn[pluginName] = function(number, options) {
      return this.each(function() {
        return $.data(this, "plugin_" + pluginName, new Plugin(this, number, options));
      });
    };
  })(jQuery, window, document);

}).call(this);



$(document).ready(function(){
  $(".barcode").each(function(index, el) {
    var code = $(this).attr('value');
    $(this).EAN13(code);
  });

})