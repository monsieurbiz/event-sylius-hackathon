build: INDEX.html
	@echo "Build complete"

INDEX.html: INDEX.md
	bash -l bin/generate.sh

serve:
	symfony local:server:start
