FROM debian

WORKDIR /root
# Install depencies
RUN apt install --no-install-recommends \
make binutils build-essential gcc g++ bzip2 cpio unzip patch rsync bc wget file perl libncurses-dev ca-certificates\
perl-modules libssl-dev git &&\
wget https://github.com/moby/moby/raw/master/contrib/check-config.sh ;\
mv check-config.sh /usr/bin/docker-check-config.sh ;\
chmod +x /usr/bin/docker-check-config.sh

ENV FORCE_UNSAFE_CONFIGURE=1

# Install Buildroot
RUN git clone --depth 1 --single-branch --branch master  https://git.buildroot.net/buildroot



