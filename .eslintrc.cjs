/* eslint-disable no-magic-numbers */
module.exports = {
  root: true,
  env: {
    node: true,
    es6: true,
    commonjs: true,
    jest: true,
  },
  ignorePatterns: ['api/viewBuilder.ts', './vite.config.js'],
  parser: 'vue-eslint-parser',
  parserOptions: {
    parser: '@typescript-eslint/parser',
  },
  plugins: [
    '@typescript-eslint'
  ],
  extends: [
    'eslint:recommended',
    'plugin:vue/recommended',
    // 'plugin:@intlify/vue-i18n/recommended',
  ],
  settings: {
    //   'vue-i18n': {
    //     localeDir: './lang/*.json',
    //   },
  },
  overrides: [
    {
      files: ['tests/**/*.spec.ts'],
      rules: {
        'no-magic-numbers': 'off'
      },
    },
  ],
  rules: {
    'no-undef': 'off',
    '@typescript-eslint/semi': 0,
    '@typescript-eslint/no-unused-vars': [
      2,
      {
        args: 'none'
      }
    ],
    'comma-dangle': [2, 'only-multiline'],
    'array-bracket-spacing': [2, 'never'],
    'block-scoped-var': 2,
    'brace-style': [2, '1tbs', {
      allowSingleLine: false,
    }],
    'prefer-const': [2, {
      destructuring: 'any',
      ignoreReadBeforeAssign: false,
    }],
    'object-shorthand': [2, 'always', {
      avoidQuotes: true,
      avoidExplicitReturnArrows: true,
    }],
    camelcase: 0,
    complexity: [2, { max: 12 }],
    'computed-property-spacing': [2, 'never'],
    'no-console': [1, { allow: ['warn', 'error'] }],
    // 'no-debugger': process.env.NODE_ENV === 'production' ? 2 : 1,
    'no-magic-numbers': [1, {
      ignoreArrayIndexes: true,
      ignore: [-1, 0, 1, 2],
      detectObjects: false,
    }],
    curly: 2,
    'eol-last': 2,
    eqeqeq: [2, 'smart'],
    indent: [2, 2, {
      MemberExpression: 1,
      ObjectExpression: 1,
    }],
    //   '@intlify/vue-i18n/no-raw-text': [
    //     'error',
    //     {
    //       ignorePattern: '^[-#:()&\/*:\d]+$',
    //       ignoreText: ['']
    //     }
    //   ],
    'max-depth': [1, 3],
    'max-len': 0,
    'max-statements': [1, 60],
    'max-nested-callbacks': [2, 3],
    'multiline-ternary': [2, 'never'],
    'new-cap': 1,
    'no-else-return': 2,
    'no-plusplus': 0,
    'no-extend-native': 2,
    'no-mixed-spaces-and-tabs': 2,
    'no-trailing-spaces': 2,
    'no-unreachable': 2,
    'no-unexpected-multiline': 2,
    'no-constant-condition': 0,
    'no-unused-vars': [2, { ignoreRestSiblings: true }],
    'no-empty-function': [1, { allow: ['arrowFunctions'] }],
    'no-use-before-define': [2, 'nofunc'],
    'no-var': 2,
    'object-curly-spacing': [1, 'always', { objectsInObjects: true }],
    'padding-line-between-statements': [
      1,
      { blankLine: 'always', prev: '*', next: 'return' },
    ],
    quotes: [1, 'single', 'avoid-escape'],
    'quote-props': [1, 'as-needed'],
    semi: [2, 'always'],
    'keyword-spacing': [2, {
      before: true,
      after: true,
    }],
    'space-unary-ops': 2,
    'space-in-parens': [1, 'never'],
    'arrow-parens': 0,
    'generator-star-spacing': 0,
    'space-before-blocks': 2,
    'space-before-function-paren': [2, {
      anonymous: 'never',
      named: 'never',
    }],
    'no-unused-labels': 1,
    'no-restricted-imports': [2, {
      paths: [{
        name: 'axios',
        importNames: ['default'],
        message: 'Please use an API file or function to make requests.'
      }]
    }],
    'vue/no-lone-template': 0,
    // Vue rules:
    'vue/no-v-model-argument': 0,
    'vue/html-self-closing': 0,
    'vue/max-attributes-per-line': 0,
    'vue/singleline-html-element-content-newline': 0,
    'vue/no-useless-v-bind': 2,
    'vue/no-useless-mustaches': [2, {
      ignoreIncludesComment: false,
      ignoreStringEscape: false,
    }],
    'vue/multi-word-component-names': 0,
    'vue/no-reserved-component-names': 0,
    'vue/no-side-effects-in-computed-properties': 0,
    'vue/no-setup-props-destructure': 1,
    'vue/html-closing-bracket-newline': 0,
  },
};

