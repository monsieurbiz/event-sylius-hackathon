build: INDEX.md
	@echo "Build complete"
INDEX.md:
	bash -l bin/generate.sh
