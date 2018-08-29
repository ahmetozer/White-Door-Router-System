################################################################################
#
# Vagrantfile
#
################################################################################

# Buildroot version to use
RELEASE='2018.05'

### Change here for more memory/cores ###
VM_MEMORY=4096
VM_CORES=8

Vagrant.configure('2') do |config|
	config.vm.box = 'bento/ubuntu-16.04'

	config.vm.provider :vmware_fusion do |v, override|
		v.vmx['memsize'] = VM_MEMORY
		v.vmx['numvcpus'] = VM_CORES
	end

	config.vm.provider :virtualbox do |v, override|
		v.memory = VM_MEMORY
		v.cpus = VM_CORES

		required_plugins = %w( vagrant-vbguest )
		required_plugins.each do |plugin|
		  system "vagrant plugin install #{plugin}" unless Vagrant.has_plugin? plugin
		end
	end

	config.vm.provision 'shell' do |s|
		s.inline = 'echo Setting up machine name'

		config.vm.provider :vmware_fusion do |v, override|
			v.vmx['displayname'] = "Buildroot #{RELEASE}"
		end

		config.vm.provider :virtualbox do |v, override|
			v.name = "Buildroot #{RELEASE}"
		end
	end

	config.vm.provision 'shell', privileged: true, inline:
		"sed -i 's|deb http://us.archive.ubuntu.com/ubuntu/|deb mirror://mirrors.ubuntu.com/mirrors.txt|g' /etc/apt/sources.list
		dpkg --add-architecture i386
		apt-get -q update
		apt-get purge -q -y snapd lxcfs lxd ubuntu-core-launcher snap-confine
		apt-get -q -y install build-essential libncurses5-dev \
			git bzr cvs mercurial subversion libc6:i386 unzip bc
		apt-get -q -y autoremove
		apt-get -q -y clean
		update-locale LC_ALL=C
		apt install golang -y"

	config.vm.provision 'shell', privileged: false, inline:
		"echo 'Downloading and extracting buildroot #{RELEASE}'
		wget -q -c http://buildroot.org/downloads/buildroot-#{RELEASE}.tar.gz
		tar axf buildroot-#{RELEASE}.tar.gz
		git clone https://github.com/AhmetOZER/White-Door-Router-System.git
		echo 'cp White-Door-Router-System/root/* buildroot-#{RELEASE}/output/target' "

end
