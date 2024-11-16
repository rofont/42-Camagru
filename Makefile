start: build-picture
	docker-compose up

make up:
	docker-compose up

build-picture:
	docker-compose build

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

PHONY: buid-picture start clean down prune fclean

