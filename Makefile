build-picture:
	docker-compose build

start: build-picture
	docker-compose up

clean: down ## Stop Inception & Clean inception docker (prune -f)
	docker image prune --force \
	&& docker volume prune --force

down: ## Stop Inception
	docker-compose down -v

# cleanvol: ## Remove persistant datas
# 	sudo rm -rf /home/rofontai/data

prune: ## option exec (prune --all --force)
	docker system prune --all --force

fclean: down clean prune #cleanvol ## Remove all dockers on this system & Remove persistant datas

help:
	@ awk 'BEGIN {FS = ":.*##";} /^[a-zA-Z_0-9-]+:.*?##/ { printf "  \033[36m%-15s\033[0m %s\n", $$1, $$2 } /^##@/ { printf "\n\033[1m%s\033[0m\n", substr($$0, 5) } ' $(MAKEFILE_LIST)

