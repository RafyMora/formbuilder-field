import { build } from 'esbuild';

build({
  entryPoints: [
    'node_modules/formBuilder/dist/form-builder.min.js',
    'node_modules/formBuilder/dist/form-render.min.js'
  ],
  bundle: false,
  minify: true,
  outdir: 'resources/assets/js',
});
